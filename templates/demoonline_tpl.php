<div class="wrap" id="sub">
  <div class="container">
	<div id="snavi">    
        <p><script>
/*
	?????	: ??????? ???
	?????	: ?????
	?????	: 2011.10.13
	?????	- ?????? ???????? src?? ???????.
			- obj 	= ???? img
			- flag 	= on, off
*/
function snaviReplace(obj,flag){
	try {
		var snaviSrc = obj.attr("src");
		if(flag == "on"){
			snaviSrc = snaviSrc.replace(".gif","_on.gif");
		} else if(flag == "off"){
			snaviSrc = snaviSrc.replace("_on.gif",".gif");
		}
		obj.attr("src",snaviSrc);
	} catch(e) {}
}

$(function(){
	var snbArea = $(".snb_area");
 	var snb = $("#snb");
	var snb1Deps = $("#snb > li");
	var snb2Deps = $("#snb > li > ul > li");
	var snbTotal = $(".allmenu > h2 ");
	var snb1Reset = snb1Deps.eq(snb1Idx-1);
	var snb2Reset = snb1Reset.find(">ul >li").eq(snb2Idx-1);;
	var has2depth = $(".snb_2depth");
	var snbH2 = $(".t_h2");
	var $allMenu 		= $(".allmenu");								//??????
	var $allMenuArea	= $("#allmenu_area");							//??? ??? ????? ???
	var all2depth = $(".all2depth");

	hideGnb();
	resetGnb();

	function hideGnb(){
		$("#allmenu_area").hide();
		$(".all2depth").hide();
		$(".all2depth").remove();
	};

	function showGnb(){
		$(".header_wrap").after("<div class='all2depth'></div>");	
		$(".all2depth").css("height",all2depth.height()).show();
	};
	
	//1??? ???
	snb1Deps.mouseenter(function(){
		snb1Deps.each(function(){
			snaviReplace($(this).find(">h2 >a >img"), "off");
			$(this).find(">ul").hide();
		});
		snaviReplace($(this).find(">h2 >a >img"), "on");
		//$(this).find(">ul").show();
		//snb2Deps.removeClass("on");
	}).focusin(function(){
		$(this).mouseenter();
	});

	snbArea.mouseleave(function(){
		//hideGnb();
		resetGnb();
		return false;
	});
/*
	//snb 2depth ?????
	snbH2.mouseenter(function(){
		//showGnb();
	}).focusin(function(){
		//$(this).mouseenter();
	});

	$(".inner, .leftSection, #content").mouseenter(function(){
		hideGnb();
		resetGnb();
	}).focusin(function(){
		$(this).mouseenter();
	});

	

/*
	//????? ??? ??? ?? ?????
	snb.mouseleave(function(){
		if(! $allMenu.hasClass("active") ){ //???????? ??????????? ???
			resetGnb();
		};
	});
	$(".inner, .allmenu, #container ").focusin(function(){
		if(! $allMenu.hasClass("active") ){ //???????? ??????????? ???
			resetGnb();
		};
	});
*/
	
	//??????
	function resetGnb(){
		snb1Deps.each(function(){
			snaviReplace($(this).find(">h2 >a >img"), "off");
			//$(this).find(">ul").hide();
		});
		if(snb1Idx != 0){
			snaviReplace(snb1Reset.find(">h2 >a >img"), "on");
			//snb1Reset.find(">ul").show();
		};
		if(snb2Idx != 0){
			snb2Deps.removeClass("on");
			snb2Reset.addClass("on");
		};
	};
	
	//  ?????
	resetGnb();	
	
	//??????
	$allMenu.find("> h2 > a").click(function(){
		//snaviReplace ( snb1Reset.find("> h2 > a > img"),  "off" );
		//snb.find(" > li.on").removeClass("on").find("ul").hide(); 
		$allMenuArea.show();
		//snaviReplace($(this).find("img") ,  "on");
		//$allMenu.addClass("active");
		showGnb();
		//return false;
	});
	
	$allMenu.find(".close").click(function(){
		//snb1Reset.addClass("on").find("ul").show(); 
		$allMenuArea.hide();
		//$allMenu.removeClass("active");
		//snb.find(" > li.on").removeClass("on").find("ul").hide();
		hideGnb();
	});	

});

</script>



<!-- snb -->
</p><div class="snb_area">
  <ul id="snb">
    <li class="snb01 active">
      <h2 class="t_h2"><a href="demo-online.html"">
                    <?=_demoonline?>
                </a>
            </h2>
    </li>
  </ul>
</div>
<!-- // snb -->
<script>
    var snb1Idx = 1;
    var snb2Idx = 1;
</script>








<p>		
	</p></div>
	<div id="contents">
 	<h1>
<?=_demoonline?>
</h1>
	    <div class="location">
        	<ul><li class="home"><a href="/">HOME</a></li><li>Demo Online</li><li>
<?=_demoonline?>
</li></ul>
      	</div><style type="text/css">
#center {
	margin-left: 250px;
}
</style>
<script language="JAVASCRIPT">
<!--

function selectDomain( val, idx ) {
	var el = document.getElementById( idx );

	if( val == "" ) {
		el.readOnly = false;
		el.value = "";
		el.focus();
	} else {
		el.value = val;
		el.readOnly = true;
	}
}

function formSubmit() {
	var frm = document.getElementById( "formInsert" );


	var arrInput	= [ "inquiry_mkr_nm2", "inquiry_mkr_nm1", "inquiry_etc1" ];
	var arrTxt		= [ "?????", "?????????", "??????" ];

	var patternNo			= new RegExp('[^0-9]', 'i');
	var patternEmail	= new RegExp('[^a-zA-Z0-9_.]', 'i');

	for( var i = 0; i < 3; i++ ) {
		var el = arrInput[i].split( '|' );

		for( var j = 0; j < el.length; j++ ) {

			var obj = eval( 'document.getElementById( \'formInsert\').' + el[j] );

			if( !obj.value || obj.value == '' ) {
				alert( arrTxt[i] + ' ????? ?????.' );
				obj.focus();
				return false;
			}
			else {
				//?????? ??? ????? ????
				if( el[j] == 'email1' || el[j] == 'email2' ) {
					if( patternEmail.exec( obj.value ) != null ) {
						alert( '?????? ????? ????? ?????.' );
						obj.focus();
						obj.select();
						return false;
					}
				}

				//?????? ????? ????
				if( el[j] == 'phone1' || el[j] == 'phone2' || el[j] == 'phone3' ) {
					if( patternNo.exec( obj.value ) != null ) {
						alert( '????????? ????? ????? ?????.' );
						obj.focus();
						obj.select();
						return false;
					}

					if( el[j] == 'phone2' && obj.value.length < 3 ) {
						alert( '????????? ????? ????? ?????.' );
						obj.focus();
						return false;
					}

					if( el[j] == 'phone3' && obj.value.length < 4 ) {
						alert( '????????? ????? ????? ?????.' );
						obj.focus();
						return false;
					}
				}
			}
		}
	}

	if ( confirm( '?????????????' ) ) {
		frm.submit();

		document.getElementById( "btnSubmit" ).innerHTML = '<img src="../image/sub/btn_send.gif" border="0" alt="?????">';
	}
	
}
//-->
</script>
<div id="page"> <span class="demoonline-title-sub"><?=_demoonline_basic_infomation?></span>
<form name="formInsert" id="formInsert" target="_self" enctype="multipart/form-data" ng-app="myApp" ng-controller="validateCtrl" novalidate="" class="ng-pristine ng-scope ng-invalid ng-invalid-required ng-valid-maxlength">
  <table width="100%" class="tbl_type" border="1" cellspacing="0" summary="?????????">
    <caption>
    basic information
    </caption>
    <colgroup>
    <col width="190">
    <col>
    <col width="120">
    <col>
    </colgroup>
    <tbody>
      <tr>
        <th scope="row">* Clinic name</th>
        <td>
			<input name="inquiry_mkr_nm2" ng-model="inquiry_mkr_nm2" required="" type="text" maxlength="50" hname="?????" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength">
			<br>
			<p style="color:red" ng-show="formInsert.inquiry_mkr_nm2.$invalid &amp;&amp; !formInsert.inquiry_mkr_nm2.$pristine" class="help-block ng-hide">Clinic name is required.</p>
		</td>
      </tr>
      <tr>
        <th scope="row">* Contact person</th>
        <td><input name="inquiry_mkr_nm1" ng-model="inquiry_mkr_nm1" required="" type="text" maxlength="20" hname="???" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength">
			<p style="color:red" ng-show="formInsert.inquiry_mkr_nm1.$invalid &amp;&amp; !formInsert.inquiry_mkr_nm1.$pristine" class="help-block ng-hide">Contact person is required.</p>
		</td>
      </tr>
      <tr>
        <th scope="row">* Country</th>
        <td><input name="inquiry_etc1" ng-model="inquiry_etc1" required="" type="text" maxlength="50" hname="???" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength">
			<p style="color:red" ng-show="formInsert.inquiry_etc1.$invalid &amp;&amp; !formInsert.inquiry_etc1.$pristine" class="help-block ng-hide">Country is required.</p>
		</td>	
      </tr>
      <tr>
        <th scope="row">Address</th>
        <td><input name="inquiry_zip_code" type="text" size="4">
          -
          <input name="inquiry_zip_code2" type="text" size="4">
          <br>
          <input name="inquiry_addr" type="text" size="65" hname="??????">
		</td>
		  
      </tr>
      <tr>
        <th scope="row">* Phone</th>
        <td>
			<input name="inquiry_tel_no2" ng-model="inquiry_tel_no2" required="" type="text" size="5" maxlength="4" hname="???" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength">
			<input name="inquiry_tel_no3" ng-model="inquiry_tel_no3" required="" type="text" size="5" maxlength="4" hname="???" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength">
			<br>
			<p style="color:red" ng-show="(formInsert.inquiry_tel_no2.$invalid &amp;&amp; !formInsert.inquiry_tel_no2.$pristine) || (formInsert.inquiry_tel_no3.$invalid &amp;&amp; !formInsert.inquiry_tel_no3.$pristine)" class="help-block ng-hide">Phone is required.</p>
		</td>
      </tr>
      <tr>
        <th scope="row">Cell Phone</th>
        <td><input name="inquiry_hp_no2" ng-model="inquiry_hp_no2" required="" type="text" size="5" maxlength="4" hname="?????" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength">
          <input name="inquiry_hp_no3" ng-model="inquiry_hp_no3" required="" type="text" size="5" maxlength="4" hname="?????" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength"></td>
      </tr>
      <tr>
        <th scope="row">* E-mail</th>
        <td><input name="inquiry_eml1" ng-model="inquiry_eml1" required="" type="text" size="15" maxlength="50" hname="?????" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength">
          @
          <input name="inquiry_eml2" ng-model="inquiry_eml2" required="" type="text" size="15" maxlength="50" hname="?????" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength">
		  <br>
			<p style="color:red" ng-show="(formInsert.inquiry_eml1.$invalid &amp;&amp; !formInsert.inquiry_eml1.$pristine)||(formInsert.inquiry_eml2.$invalid &amp;&amp; !formInsert.inquiry_eml2.$pristine) " class="help-block ng-hide">E-mail is required.</p>
		</td>	
      </tr>
    </tbody>
  </table>
  
  <!--//ui object --> 
  
  <!--ui object --> 
  <br>
  <span class="demoonline-title-sub"><?=_demoonline_inquiry?></span><br>
  <table width="100%" class="tbl_type" border="1" cellspacing="0" summary="inquiry">
    <caption>
    inquiry
    </caption>
    <colgroup>
    <col width="190">
    <col>
    <col width="120">
    <col>
    </colgroup>
    <tbody>
      <tr>
        <th scope="row">* Request date</th>
        <td>
			<input name="inquiry_etc2" ng-model="inquiry_etc2" required="" type="text" maxlength="50" hname="?????" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength">
			<br>
			<p style="color:red" ng-show="formInsert.inquiry_etc2.$invalid &amp;&amp; !formInsert.inquiry_etc2.$pristine" class="help-block ng-hide">Request date is required.</p>
		</td>
      </tr>
      <tr>
        <th scope="row">* Product name</th>
        <td>
			<input name="inquiry_title" ng-model="inquiry_title" required="" type="text" maxlength="50" hname="?????" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-maxlength">
			<br>
			<p style="color:red" ng-show="formInsert.inquiry_title.$invalid &amp;&amp; !formInsert.inquiry_title.$pristine" class="help-block ng-hide">Product name is required.</p>
		</td>
      </tr>
      <tr>
        <th scope="row">* Comments/Questions</th>
        <td>
			<textarea name="inquiry_contents" ng-model="inquiry_contents" required="" rows="10" cols="62" hname="??? ?? ???" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required"></textarea>
			<br>
			<p style="color:red" ng-show="formInsert.inquiry_contents.$invalid &amp;&amp; !formInsert.inquiry_contents.$pristine" class="help-block ng-hide">Comments/Questions is required.</p>
		</td>
      </tr>
    </tbody>
  </table>
  <!-- ?????? ?????? ??? --> 
<!--   <br>
  <img src="../images/sub/04_03_tt.jpg" /><br>
  <table width="100%" class="tbl_type2" border="1" cellspacing="0" summary="????????????">
    <tbody>
      <tr>
        <td scope="row"><p>?????? ??? ?? ??? ????? ??? ????? ??? ???????? ?????? ??????.<br>
            1. ??? ?????? ??? : ???, ?????, ?????<br>
            2. ???????? ??? ?? ?????? : ??? ??? ??? ?? ?????? ??? ?? ????? ?????? ??? ???<br>
            3. ???????? ?????? : ?????? ??? ?? ?????? ??? ??, ??? ???????? ???? ??? ????????.<br>
            ?? ??? ????? ?????????????? ????????.</p></td>
      </tr>
    </tbody>
  </table>
  <input id="agree" name="agree" type="checkbox" value="" style="vertical-align:bottom; " >
  ?????? ??? ?? ????? ????????. <br> -->
  <!-- ?????? ?????? ?? --> 

  <br>
  <div id="center"><img src="static/images/sub/ok_bt.jpg" ng-click="submit()" style="cursor:pointer;"> <span><a href="#"><img src="static/images/sub/cancel_bt.jpg"></a></span></div>
  <p></p>
  <!--//ui object --> 
</form></div>
</div>
</div>
</div>

<script>
	// AngulaJS
	var app = angular.module('myApp', []);
	app.controller('validateCtrl', function($scope,$http) {
		$scope.submit = function() {
			
			var patternNo			= new RegExp('[^0-9]', 'i');
			var patternEmail	= new RegExp('[^a-zA-Z0-9_.]', 'i');
			
			if($scope.inquiry_mkr_nm2 ==null){
				alert( 'Clinic name is required.' );
				return;
			}
			if($scope.inquiry_mkr_nm1 ==null){
				alert( 'Contact person is required.' );
				return;
			}
			if($scope.inquiry_etc1 ==null){
				alert( 'Country is required.' );
				return;
			}
			if($scope.inquiry_mkr_nm2 ==null){
				alert( 'Clinic name is required.' );
				return;
			}
			if($scope.inquiry_tel_no2 ==null || $scope.inquiry_tel_no3 ==null){
				alert( 'Phone is required.' );
				return;
			}
			
			if( $scope.inquiry_tel_no2 !=null && $scope.inquiry_tel_no3 !=null ) {
				if( patternNo.exec( $scope.inquiry_tel_no2 ) != null || patternNo.exec( $scope.inquiry_tel_no3 )) {
					alert( '?????? ????? ????? ?????.1' );
					return false;
				}
			}
			
			if( $scope.inquiry_tel_no2 !=null && $scope.inquiry_tel_no2.length < 3 ) {
				alert( '????????? ????? ????? ?????.' );
				return false;
			}

			if( $scope.inquiry_tel_no3 !=null && $scope.inquiry_tel_no3.length < 4 ) {
				alert( '????????? ????? ????? ?????.' );
				obj.focus();
				return false;
			}
			
			if($scope.inquiry_eml1 ==null || $scope.inquiry_eml1 ==null){
				alert( 'E-mail is required.' );
				return;
			}
			if($scope.inquiry_eml1 !=null && $scope.inquiry_eml1 !=null){
				if( patternEmail.exec( $scope.inquiry_eml1) != null || patternEmail.exec( $scope.inquiry_eml2) != null) {
					alert( '?????? ????? ????? ?????.' );
					return false;
				}
			}
			if($scope.inquiry_etc2 ==null){
				alert( 'Request date is required.' );
				return;
			}
			if($scope.inquiry_title ==null){
				alert( 'Product name is required.' );
				return;
			}
			if($scope.inquiry_contents ==null){
				alert( 'Comments/Questions is required.' );
				return;
			}

			if ( confirm( '?????????????' ) ) {
				//frm.submit();
				//document.getElementById( "btnSubmit" ).innerHTML = '<img src="../image/sub/btn_send.gif" border="0" alt="?????">';
				$http({
					url: 'http://localhost:81/vcontrol/ajax/demo-online.php',
					method: "POST",
					data: { 'Clinic' : $scope.inquiry_mkr_nm2 != undefined ? $scope.inquiry_mkr_nm2:"",
                                                'Contact': $scope.inquiry_mkr_nm1 != undefined ? $scope.inquiry_mkr_nm1 : "",
                                                'Country': $scope.inquiry_etc1 != undefined ? $scope.inquiry_etc1: "",
                                                'Zipcode': $scope.inquiry_zip_code != undefined ? $scope.inquiry_zip_code : "",
                                                'Address': $scope.inquiry_addr != undefined ? $scope.inquiry_addr : "",
                                                'Phone': $scope.inquiry_tel_no2 + " " + $scope.inquiry_tel_no3,
                                                'Email': $scope.inquiry_eml1 + "@" + $scope.inquiry_eml2,
                                                'Request-date': $scope.inquiry_etc2 != undefined ? $scope.inquiry_etc2 : "",
                                                'Request_date': $scope.inquiry_etc2 != undefined ? $scope.inquiry_etc2 : "",
                                                'Product_name': $scope.inquiry_title != undefined ? $scope.inquiry_title : "",
                                                'comment': $scope.inquiry_contents != undefined ? $scope.inquiry_contents : ""
                                        }
				})
				.then(function(response) {
					 window.location = "http://localhost/vcontrol/";
				}, 
				function(response) { // optional
					alert( 'failed' );
				});
			}
	
      };
	});
</script>