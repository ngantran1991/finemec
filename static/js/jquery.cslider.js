// Authored by BizStream - 8/4/2015
; (function (factory) {
  if (typeof define === 'function' && define.amd) {
    define(['jquery'], factory);
  } else if (typeof exports !== 'undefined') {
    module.exports = factory(require('jquery'));
  } else {
    factory(jQuery);
  }
})(function ($) {

  var cSlider = (function (element, settings) {
    var instanceUid = 0;

    // Constructor
    function _cSlider(element, settings) {
      this.defaults = {
        slideDuration: '3000',
        speed: 500,
        nextArrow: '<button class="cSlider-arrow cSlider-arrow-next"></button>',
        prevArrow: '<button class="cSlider-arrow cSlider-arrow-prev"></button>',
        offsetPercent: .7
      };

      // Merge default settings with specified settings
      this.settings = $.extend({}, this, this.defaults, settings);

      this.initials = {
        currSlide: 0,
        $currSlide: null,
        totalSlides: false,
        csstransitions: false
      };

      this.throttle = false;

      // Attach properties to slider
      $.extend(this, this.initials);

      // Store DOM element
      this.$el = $(element);

      // Standardize 'this' to always reference cSlider
      this.slide = $.proxy(this.slide, this);

      this.init();

      // Give each slider a unique ID
      this.instanceUid = instanceUid++;
    }

    return _cSlider;

  })();

  // Called once per instance
  // Starts slider
  cSlider.prototype.init = function () {
    // Test to see if CSS Transitions are available
    this.csstransitionsTest();
    // Add a class so slider can be styled
    this.$el.addClass('cSlider');
    // Build out DOM
    this.build();
    // Events - Arrows
    this.events();
    // Bind events needed for slider to function
    this.activate();
  };

  // Test to see if CSS Transitions are available
  cSlider.prototype.csstransitionsTest = function () {
    var elem = document.createElement('modernizr');
    // List of props to test for
    var props = ["transition", "WebkitTransition", "MozTransition", "OTransition", "msTransition"];
    // Iterate through to see if properties are available
    for (var i in props) {
      var prop = props[i];
      var result = elem.style[prop] !== undefined ? prop : false;
      if (result) {
        this.csstransitions = result;
        break;
      }
    }
  };

  // Add CSSTransition duration to each slide
  cSlider.prototype.addCSSDuration = function () {
    this.$el.style[this.csstransitions + 'Duration'] = _.settings.speed + 'ms';
  }

  // Remove CSSTransition duration after slides have animated
  cSlider.prototype.removeCSSDuration = function () {
    this.$el.style[this.csstransitions + 'Duration'] = '';
  }

  // Build DOM
  cSlider.prototype.build = function () {
    // Add class to each slide
    this.$el.children().each(function () {
      this.className += ' cSlider-slide';
    });

    this.$el.addClass('cSlider-activated');

    this.$el.find('.cSlider-slide').wrapAll('<div class="cSlider-wrap" />');

    if (this.csstransitions) {
      this.$el.find('.cSlider-wrap').addClass('cssAnimate');
    }

    // Adds arrows
    var prevArrow = $(this.settings.prevArrow).addClass('cSlider-arrow-prev cSlider-arrow cSlider-arrow-disabled');
    this.$el.append(prevArrow);
    var nextArrow = $(this.settings.nextArrow).addClass('cSlider-arrow-next cSlider-arrow');
    this.$el.append(nextArrow);
  };

  // Activate first slide
  cSlider.prototype.activate = function () {
    this.$currSlide = this.$el.find('.cSlider-slide').eq(0);
  };

  // Disables/Enables specified arrow
  // Takes either 'left' or 'right' for arrow
  // and true/false for onOff
  cSlider.prototype.toggleArrow = function (arrow, onOff) {
    var arrow;

    if (arrow == 'left') {
      arrow = this.$el.find('.cSlider-arrow-prev');
      (onOff ? arrow.addClass('cSlider-arrow-disabled') : arrow.removeClass('cSlider-arrow-disabled'));
    }
  }

  // Event handler
  cSlider.prototype.events = function () {
    $('body')
    .on('click', '.cSlider-arrow-next', { direction: 'right' }, this.slide)
    .on('click', '.cSlider-arrow-prev', { direction: 'left' }, this.slide);

    var sliderWrap = this.$el.find('.cSlider-wrap');
    var _ = this;

    sliderWrap.draggable({
      axis: "x",
      start: function () {
        sliderWrap.removeClass('cssAnimate');
      },
      drag: function () {
        var arrow = _.$el.find('.cSlider-arrow-prev');
        if (sliderWrap.offset().left < 0) {
          console.log("enable arrow")
          arrow.removeClass('cSlider-arrow-disabled');
        } else {
          arrow.addClass('cSlider-arrow-disabled');
        }
      },
      stop: function () {
        sliderWrap.addClass('cssAnimate');

        if (sliderWrap.offset().left > 0) {
          sliderWrap.css({ 'left': 0 });
        }
      }
    });
  };

  // Controls slide
  // - Determine direction
  // - Determine how far to slide based on screen width
  cSlider.prototype.slide = function (e) {
    // Make sure only one animation is triggered at one time
    console.log(this.throttle);
    if (this.throttle) return;

    // Returns the animation direction (left or right)
    var direction = this._direction(e);

    var distance = this.$el.width() * this.settings.offsetPercent;

    // Selects next active slide
    var offset = this._calcOffset(distance, direction);

    if (offset == null) return;
    if (offset == 0) {
      this.$el.find('.cSlider-arrow-prev').addClass('cSlider-arrow-disabled');
    } else {
      this.$el.find('.cSlider-arrow-prev').removeClass('cSlider-arrow-disabled');
    }

    this.throttle = true;
    if (!this.csstransitions) {
      this._jsAnimation(offset);
    } else {
      this._cssAnimation(offset);
    }

    if (offset == 0) {

    }
  };

  // Returns animation direction
  cSlider.prototype._direction = function (e) {
    var direction;

    if (typeof e !== 'undefined') {
      direction = (typeof e.data === 'undefined' ? 'right' : e.data.direction);
    } else {
      direction = 'right';
    }

    return direction;
  }

  // Calculated offset for the next animation
  // Will calculate if the slider is maxed out in either direction
  cSlider.prototype._calcOffset = function (distance, direction) {

    // Get current offset of slider
    var currentOffset = $('.cSlider-wrap').offset().left;

    // Determine positive shift or negative
    var offsetChange = (direction == 'left' ? distance : distance * -1);

    // Determine final offset
    var offset = currentOffset + offsetChange;

    // Check for slider left limit
    if (direction == 'left') {
      offset = (offset < 0 ? offset : 0);
    } else {
      // Check for slider right limit

      // Last slide's offset
      var lastSlide = $('.cSlider-slide').last(),
      lastSlideWidth = lastSlide.width(),
      lastSlideOffset = lastSlide.offset().left;

      offset = (lastSlideWidth + lastSlideOffset < $('.cSlider').width() ? null : offset);
    }

    return offset;
  }

  // CSS Animations
  cSlider.prototype._cssAnimation = function (offset) {
    $('.cSlider-wrap').css({ 'left': offset });
    this.throttle = false;
  };

  // JS Animations
  cSlider.prototype._jsAnimation = function (offset) {
    var _ = this;



    $('.cSlider-wrap').animate({ 'left': offset }, this.settings.speed, 'swing', function () {
      console.log("finished");
      _.throttle = false;

    });
  };

  // Update slide indicators
  cSlider.prototype._updateIndicators = function () { };

  // Initialize plugin once DOM element is passed to jQuery
  // Parameters - object, options object
  $.fn.cSlider = function (options) {
    return this.each(function (index, el) {
      el.cSlider = new cSlider(el, options);
    })
  }
});
