var mtab1 = document.getElementById('t1');
var mtab2 = document.getElementById('t2');
var mtab3 = document.getElementById('t3');

var xhr = new XMLHttpRequest();                 // XMLHttpRequest 객체를 생성한다.


function ajax_call(localm){
  //alert(xhr.responseText);
  //if(xhr.status === 200) {                      // If server status was ok
    responseObject = JSON.parse(xhr.responseText);  //서버로 부터 전달된 json 데이터를 responseText 속성을 통해 가져올 수 있다.
	var localText='';                                                 // parse() 메소드를 호출하여 자바스크립트 객체로 변환한다.
    if(localm==1){
        localText='접수중프로그램';
    }else if(localm==2){
        localText='교육중프로그램';
    }else if(localm==3){
        localText='마감프로그램';
    }

    var newContent = '';
    
    // newContent += '<h3>부평구 문화재단 프로그램</h3>'; 
    newContent += '<ul class="ul_box">'; 
    
    for (var i = 0; i < responseObject.program.length; i++) {
      

        newContent += '<li>'; 
        newContent += '<img src="'+responseObject.program[i].cimg+'" alt="'+responseObject.program[i].cname+'">';
        newContent += '<dl>';
        newContent += '<dt><span class="'+responseObject.program[i].type1+'">'+responseObject.program[i].type2+'</span>'+responseObject.program[i].cname+'</dt>';    
        newContent += '<dd>모집인원 :'+responseObject.program[i].people+'</dd>'
        newContent += '<dd>교육장소 :'+responseObject.program[i].place+'</dd>'
        newContent += '<dd>교육대상 :'+responseObject.program[i].age+'</dd>'
        newContent += '<dd>문 의 처 :'+responseObject.program[i].phone+'</dd>'
        newContent += '</dl>'; 
        newContent += '<span class="span '+responseObject.program[i].type3+'"> <a href="#bu4">신청</a> <a href="#bu5">문의</a> </span>';
        newContent += '</li>';
        
    }
    
    newContent += '</ul>';
    newContent += '<span class="page"><a href="#">1</a></span>';
 
    document.getElementById('contacts1').innerHTML = newContent;

}

xhr.onload = function() {                       //페이지 로딩시 출력
   ajax_call(1);
};

xhr.open('GET', './data/sub5_2_1.json', true);        // 요청을 준비한다.
xhr.send(null);                                 // 요청을 전송한다



// 각각의 버튼 클릭시 json 파일 로드 및 출력

mtab1.onclick = function(){  //mtab1을 클릭하면
    xhr.onload = function() {                       // When readystate changes
    ajax_call(1);
    };
    xhr.open('GET', './data/sub5_2_1.json', true);  //data.json파일을 불러온다.      // 요청을 준비한다.
    xhr.send(null);     
}

mtab2.onclick = function(){ //mtab2을 클릭하면
    xhr.onload = function() {                       // When readystate changes
    ajax_call(2);
    };
    xhr.open('GET', './data/sub5_2_2.json', true);   //data.json2파일을 불러온다.       // 요청을 준비한다.
    xhr.send(null);     
}


mtab3.onclick = function(){//mtab3을 클릭하면
    xhr.onload = function() {                       // When readystate changes
    ajax_call(3);
    };
    xhr.open('GET', './data/sub5_2_3.json', true);     //data.json3파일을 불러온다.     // 요청을 준비한다.
    xhr.send(null);    
}

