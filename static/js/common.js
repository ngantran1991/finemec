/* bookmark Script */
function bookmark() { 
window.external.AddFavorite('http://www.abchome.co.kr', 'ABCHOME');
}

//PNG �щ챸�섍쾶
function setPng24(obj) {
	obj.width=obj.height=1;
	obj.className=obj.className.replace(/png24/i,'');
	obj.style.filter =
	"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+ obj.src +"',sizingMethod='image');"
	obj.src='';
	return '';
}

//�덉씠�댄뙘��
function setCookie( name, value, expiredays )
{
    var todayDate = new Date();
        todayDate.setDate( todayDate.getDate() + expiredays );
        document.cookie = name + '=' + escape( value ) + '; path=/; expires=' + todayDate.toGMTString() + ';'
}
function closeWin(flag, layer)
{
    var obj  = window.event.srcElement;

    if ( flag )
    {
        setCookie( layer, 'done' , 1 );
    }
    document.all[layer].style.visibility = 'hidden';
}
window.onload = function() // �덈룄�곗쫰 濡쒕뵫�� �앸궃��
{
    cookiedata = document.cookie;
    var divs   = document.all.tags('DIV'); // DIV �ㅼ쓣 媛��몄샃�덈떎.
    for(var i=0; i<divs.length; i++)
    {
        if(divs[i].className=='layer_popup') // DIV 以묒뿉 class 媛� layer_popup 濡� 吏��뺣맂 媛앹껜�ㅼ씠硫�
        {
            // 荑좏궎 �댁뿉�� �대떦�섎뒗 div 媛앹껜�� ID 媛믪쓣 媛�吏��� 媛앹껜瑜� 媛��몄��� �숈쟻�쇰줈 鍮꾧탳
            if( cookiedata.indexOf(divs[i].id+'=done')>=0 ) document.all[divs[i].id].style.visibility = 'hidden';
            else document.all[divs[i].id].style.visibility = 'visible';
        }
    }
}