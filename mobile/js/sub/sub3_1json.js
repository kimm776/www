var mtab1 = document.getElementById('t1');
var mtab2 = document.getElementById('t2');

var xhr = new XMLHttpRequest();                 // XMLHttpRequest 객체를 생성한다.


function ajax_call(localm){
  //alert(xhr.responseText);
  //if(xhr.status === 200) {                      // If server status was ok
    responseObject = JSON.parse(xhr.responseText);  //서버로 부터 전달된 json 데이터를 responseText 속성을 통해 가져올 수 있다.
	var localText='';                                                 // parse() 메소드를 호출하여 자바스크립트 객체로 변환한다.
    if(localm==1){
        localText='해누리극장';
    }else if(localm==2){
        localText='해누리극장';
    }

    var newContent = '';
    
    newContent += '<div class="content">'; 
    newContent += '<ul>'; 

    
    for (var i = 0; i < responseObject.concert.length; i++) {
      

        newContent += '<li>'; 
        newContent += '<img src="'+responseObject.concert[i].cimg+'" alt="'+responseObject.concert[i].cname+'">';
        newContent += '<div class="box">';
        newContent += '<span class="'+responseObject.concert[i].cplace2+'">'+responseObject.concert[i].cplace+'</span>'
        newContent += '<span class="'+responseObject.concert[i].ctype+'">'+responseObject.concert[i].ctype2+'</span>'
        newContent += '</div>';
        newContent += '<dl>';
        newContent += '<dt>'+responseObject.concert[i].cname+'</dt>';    
        newContent += '<dd><i class="fas fa-angle-right"></i><span> 공연일자</span> '+responseObject.concert[i].cdate+'</dd>'
        newContent += '<dd><i class="fas fa-angle-right"></i><span> 티켓가격</span> '+responseObject.concert[i].cpay+'</dd>'
        newContent += '<dd><i class="fas fa-angle-right"></i><span> 문의전화</span> '+responseObject.concert[i].cphone+'</dd>'
        newContent += '<dd><i class="fas fa-angle-right"></i><span> 소요시간</span> '+responseObject.concert[i].ctime+'</dd>'
        newContent += '</dl>'; 
        newContent += '<a class="a1" href="#bu1">상세보기<i class="fas fa-angle-double-right"></i></a> <a class="a2" href="#bu2">예매하기<i class="fas fa-angle-double-right"></i></a>';
        newContent += '</li>';
        
    }
    
    newContent += '</ul>';
    newContent += '</div>'; 
    newContent += '<span class="page"><a href="#bu3">1</a></span>';
 
    document.getElementById('contacts1').innerHTML = newContent;

}

xhr.onload = function() {                       //페이지 로딩시 출력
   ajax_call(1);
};

xhr.open('GET', './data/sub3_1_1.json', true);        // 요청을 준비한다.
xhr.send(null);                                 // 요청을 전송한다



// 각각의 버튼 클릭시 json 파일 로드 및 출력

mtab1.onclick = function(){  //mtab1을 클릭하면
    xhr.onload = function() {                       // When readystate changes
    ajax_call(1);
    };
    xhr.open('GET', './data/sub3_1_1.json', true);  //data.json파일을 불러온다.      // 요청을 준비한다.
    xhr.send(null);     
}

mtab2.onclick = function(){ //mtab2을 클릭하면
    xhr.onload = function() {                       // When readystate changes
    ajax_call(2);
    };
    xhr.open('GET', './data/sub3_1_2.json', true);   //data.json2파일을 불러온다.       // 요청을 준비한다.
    xhr.send(null);     
}




