{{-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open Sans"/>
<style>



#title {
    text-align: center
}
#title h3 {
    font-size: 40px;
    font-weight: 700px;
}

#quiz {

display:none;
}

ul {
list-style-type: none;
padding: 0;
margin: 0;
}

#prev {
display:none;
}
#next {
display:none;
}
#start {
display:none;
width: 90px;
}

/*fresh Css****************/
.nav-buttons{
    margin:20px 10px;
    float:right;
}

#quiz .quiz-ques-option{
  display: block!important;
  margin: 0;
  display: flex;
  flex-direction: row;
}
#quiz .quiz-ques-option li{
  flex-grow: 1;
  list-style: none;
  text-align: center;
  font-size: 20px;
  height: inherit;
  left: auto;
  vertical-align: top;
  text-align: left; 
  padding: 10px 2px;
  
}
#quiz .quiz-ques-option li span{
  margin-left: 10px;
}
#quiz .para-que{
  font-size: 24px;
}

</style>

<div class='container'>
  <div class="row">
    <div class="col-md-8 col-sm-offset-2">
      <div id='title'>
        <h3 id="qtitle"></h3>
        <p class="lead" id="qstitle" ></p>
        <button class="btn btn-primary" id="btngetstarted" onclick="handleClick()">Let's Get Started</button>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-sm-offset-2">
      <div id='quiz'></div>
      <div id='remarks'></div>
      <div class="nav-buttons">
        <a id='prev' class="btn btn-warning add_btn" href='#'>Prev</a>
        <a id='next' class="btn btn-primary add_btn" href='#'>Next</a>   
        <a id='seeresult' onclick="handleSeeResultClick" class="btn btn-info add_btn" href='#'>See result</a>     
        <a id='start' class="btn btn-success add_btn" href='#'>Start Over</a>
      </div>
    </div>
  </div>
</div>
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        
   <textarea hidden  name="quizQues" id="quizQues"></textarea> --}}

   
   <!-- ======================================= 
        ==Start footer section==  
        =======================================-->
        <footer class="main-footer footer-style-two text-center">          
             <!--Footer Bottom-->
              <div class="footer-bottom">
                 <div class="auto-container">
                    <div class="copyright-text">hafizaa@roehampton.ac.uk  <a href=""></a></div>
                 </div>
              </div>
            </footer>
            <!-- ======================================= 
            ==End footer section==  
            =======================================-->
    
    
            <!-- ======================================= 
            ==Start preloader section==  
            =======================================-->
            <section class="preloader">
              <div class="loader">
                    <div class="loader-inner"></div>
                </div>
            </section>
            <!-- ======================================= 
            ==End preloader section==  
            =======================================-->
{{--     
            <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
        
 
 
 <script type="text/javascript">
  let	handleClick=()=>{
   
    let questions=$('#quizQues').val();   
    getQuizstarted(questions);
  };
  $(document).ready(function () {
    var data={
        "_token": $('#token').val()
           
      };
    $.ajax({
      type: "get", 
      url: '{{ route('getQuiz')}}',     
      data: data, 
      dataType: 'json',
      success: function (response) {       
        var quizes = JSON.stringify(response.status);
       // alert(quizes);
        var x =JSON.parse(quizes);
        //alert(x[0]['Question']);
        $('#quizQues').val(quizes);
        $('#qtitle').text(x[0]['Quiz_Title']);
        $('#qstitle').text(x[0]['Quiz_Sub_Title']);
        $('#seeresult').hide();
        
      }
      
    });
   
  });

   
    
    //alert("1");
    

</script>      
<script>

function getQuizstarted(questions){
  $("#btngetstarted").hide();

  var questions  =JSON.parse(questions); 
  
  //[{
  //   question: "What is Product of 2 and 5 (2*5 equal to :___________)?",
  //   choices: [2, 5, 10, 15, 20],
  //   correctAnswer: 2
  // }, {
  //   question: "What is Product of  3 and  6 (3*6 equal to :___________) ?",
  //   choices: [3, 6, 9, 12, 18],
  //   correctAnswer: 4
  // }, {
  //   question: "What is product of  8 and 9 (8*9 equal to :___________) ?",
  //   choices: [72, 99, 108, 134, 156],
  //   correctAnswer: 0
  // }, {
  //   question: "What is product of  1 and 7 (2*5 equal to :___________) ?",
  //   choices: [4, 5, 6, 7, 8],
  //   correctAnswer: 3
  // }, {
  //   question: "What is product of  8 and 8 (8*8 equal to :___________) ?",
  //   choices: [20, 30, 40, 50, 64],
  //   correctAnswer: 4
  // }];
  
  var questionCounter = 0; //Tracks question number
  var selections = []; //Array containing user choices
  var quiz = $('#quiz'); //Quiz div object
 
  // Display initial question
  displayNext();
  
  // Click handler for the 'next' button
  $('#next').on('click', function (e) {
    e.preventDefault();
    $('#remarks').html("");
    // Suspend click listener during fade animation
    if(quiz.is(':animated')) {        
      return false;
    }
    choose();
    
    // If no user selection, progress is stopped
    if (!selections[questionCounter]||selections[questionCounter].length <=0) {
      alert('Please make a selection!');
    } else {
      questionCounter++;
      displayNext();
    }
  });
  
  // Click handler for the 'prev' button
  $('#prev').on('click', function (e) {
    e.preventDefault();
    $('#remarks').html("");
    if(quiz.is(':animated')) {
      return false;
    }
    choose();
    questionCounter--;
    displayNext();
  });
  
  // Click handler for the 'Start Over' button
  $('#start').on('click', function (e) {
    e.preventDefault();
    var userfrm = $('#userform');
    userfrm.remove();
    if(quiz.is(':animated')) {
      return false;
    }
    questionCounter = 0;
    selections = [];
    displayNext();
    $('#start').hide();
    $('#prev').hide();
    $('#seeresult').hide();
  });
  
  // Animates buttons on hover
  $('.button').on('mouseenter', function () {
    $(this).addClass('active');
  });
  $('.button').on('mouseleave', function () {
    $(this).removeClass('active');
  });
  
  // Creates and returns the div that contains the questions and 
  // the answer selections
  function createQuestionElement(index) {
    var qElement = $('<div>', {
      id: 'question'
    });
    
    var header = $('<h3>Question ' + (index + 1) + ':</h3>');
    qElement.append(header);
    
    var question = $('<p class="para-que">').append(questions[index].Question);
    qElement.append(question);
    
    var radioButtons = createRadios(index);
    qElement.append(radioButtons);
    
    return qElement;
  }
  //show remarks on inccorect selection 
  $('body').on('click', 'input.radioAnswer', function() {
    // do something
    $('#remarks').html("");
    selections[questionCounter] = $('input[name="answer"]:checked').val();
    var correctAnswer="" ;
    var remarks="";   
    if(selections.length>0)
    //correct
    if (selections[selections.length-1] === questions[selections.length-1].correctAnswer){
      correctAnswer+='<div class="p-3 mb-2 bg-success  text-dark" style="padding: 10px !important;margin-top:5px;margin-bottom:5px;"><strong class="text-success">Great! Your Answer is Correct.</strong><br/>'+
        '<strong>Remarks :</strong>'+questions[selections.length-1].remarks+'</div>';
    }else{
    //incorrect
      correctAnswer+='<div class="p-3 mb-2 bg-danger  text-dark" style="padding: 10px !important;margin-top:5px;margin-bottom:5px;"><strong class="text-danger">Your Answer Is Incorrect!</strong><br/><strong>Correct Answer Is :</strong>'+ questions[selections.length-1].correctAnswer +'<br/>'+
        '<strong>Remarks :</strong>'+questions[selections.length-1].remarks+'</div>';
   
  }
  $('input[name="answer"]').attr("disabled",true);
    $('#remarks').html(correctAnswer);
});
  // Creates a list of the answer choices as radio inputs
  function createRadios(index) {
    var radioList = $('<ul class="quiz-ques-option">');
    var item;
    var input = '';
    // for (var i = 0; i < questions[index].choices.length; i++) {
    //   item = $('<li>');
    //   input = '<input type="radio"  name="answer" value=' + i + ' />';
    //   input += '<span>'+questions[index].choices[i]+'</span>';
    //   item.append(input);
    //   radioList.append(item);
    // }
    item = $('<li>');
    input = '<input type="radio"  name="answer" value="OptionA"  class="radioAnswer" />';
    input += '<span>'+questions[index].OptionA+'</span>';
    item.append(input);
    radioList.append(item);
    item = $('<li>');
    input = '<input type="radio"  name="answer" value="OptionB" class="radioAnswer" />';
    input += '<span>'+questions[index].OptionB+'</span>';
    item.append(input);
    radioList.append(item);
    item = $('<li>');
    input = '<input type="radio"  name="answer" value="OptionC" class="radioAnswer" />';
    input += '<span>'+questions[index].OptionC+'</span>';
    item.append(input);    
    radioList.append(item);
    item = $('<li>');
    input = '<input type="radio"  name="answer" value="OptionD" class="radioAnswer" />';
    input += '<span>'+questions[index].OptionD+'</span>';
    item.append(input);    
    radioList.append(item);
    return radioList;
  }
  
  // Reads the user selection and pushes the value to an array
  function choose() {
    selections[questionCounter] = $('input[name="answer"]:checked').val();
    
  }
  
  // Displays next requested element
  function displayNext() {
    quiz.fadeOut(function() {
      $('#question').remove();
      
      if(questionCounter < questions.length){
        var nextQuestion = createQuestionElement(questionCounter);
        quiz.append(nextQuestion).fadeIn();
        if (!(isNaN(selections[questionCounter]))) {
          $('input[value='+selections[questionCounter]+']').prop('checked', true);
        }
        
        // Controls display of 'prev' button
        if(questionCounter === 1){
          $('#prev').hide();
          $('#seeresult').hide();
        } else if(questionCounter === 0){
          
          $('#prev').hide();
          $('#next').show();
          $('#seeresult').hide();
        }
      }
      else {
        $('#seeresult').show();
        var scoreElem = displayScore();
        quiz.append(scoreElem).fadeIn();
        $('#next').hide();
        $('#prev').hide();
        $('#start').show();
      }
    });
  }
  //see result

  // Computes score and returns a paragraph element to be displayed
  function displayScore() {
    
    var score = $('<p>',{id: 'question'});
    
    var numCorrect = 0;
    for (var i = 0; i < selections.length; i++) {
      if (selections[i] === questions[i].correctAnswer) {
        numCorrect++;
      }
    }
    displayScore2(numCorrect, questions.length);
    score.append('You got ' + numCorrect + ' questions out of ' +
                 questions.length + ' right!!!');
    return score;
  }
  function displayScore2(corr_count, total_count) {
    var qElement = $('<div>', {
      id: 'userform'
    });
    
    var header = $('<h3>Please Fill Detail to see result</h3>');
    qElement.append(header);
    
    var question = $('<input type="text" class="form-control mb-3" placeholder="Your Name" id="name" name="name"/><br/>'+
    '<input type="email" class="form-control mb-3" placeholder="Your Email" id="email" name="email"/><br/>'+
    '<input type="text" class="form-control mb-3" placeholder="Your Mobile Number" id="mobile" name="mobile"/><br/>'+
    '<input type="text" id="total_que" value="'+total_count+'" name="total_que"/>'+
    '<input type="text" id="correct_count" value="'+corr_count+'" name="correct_count"/>');
    qElement.append(question);
    quiz.append(qElement);
  
  }
}
//show remarks on incorrect answer



$(document).ready(function(){

    $('#seeresult').click(function(e) {
        e.preventDefault();
        if($('#name').val()==="" || $('#email').val()===""){
          alert('Please fill your name and email to proceed further!');
        }
        var data={
          "_token" : $('#token').val(),
          "name" : $('#name').val(),
          "email" : $('#email').val(),
          "mobile" : $('#mobile').val(),
          "total_que" : $('#total_que').val(),
          "correct_count" : $('#correct_count').val(),
        }
        $.ajax({
          type: "post",
          url: "{{ route('storeSurveyDetail') }}",
          data: data,        
          success: function (response) {
         
            if(response.status){
              var quiz = $('#quiz');
              quiz.remove();
              //$('#remarks').append('<h1>this is test</h1>')
              if(response.last_Id!=""){
              window.location.href = "/survey/"+response.last_Id+"/general-surve/result";
              }
            }
          }
        });
    });
});

(function() {

  
})();

</script>   --}}