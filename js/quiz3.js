
var score=0;
var total=5;
var point=2;
var highest=total*point;

function init()
{
	sessionStorage.setItem('a1','a');
	sessionStorage.setItem('a2','b');
	sessionStorage.setItem('a3','d');
  sessionStorage.setItem('a4','b');
	sessionStorage.setItem('a5','a');
}
$(document).ready(function()
{
	$('.Question-form').hide();
	$('#q1').show();

	$('.Question-form :submit').click(function()
	{
     current=$(this).parents('form:first').data('question');
     next=$(this).parents('form:first').data('question')+1;
     $('.Question-form').hide();
	 $('#q'+next+'').fadeIn(300);
     process(''+current+'');
	 return false;
    });
});

function process(n)
{
	var submitted=$('input[name=q'+n+']:checked').val();
		if(submitted==sessionStorage.getItem('a'+n+''))
		{
			score=score+point;
		}

	if(n==total)
	{
		$('#results').append('<h3> Your total score is  '+score+ ' out of ' +highest+' </h3>');

		if(score==highest)
		{
			$('#results').append('<h3>Excellent!!! You are a HTML master </h3>');
		}
		else if((score==(highest-point))||(score==(highest-point-point)))
		{
			$('#results').append('<h3>Good Job! You are a HTML master</h3>');
		}
		else{
			$('#results').append('<h3>You are failed </h3><a href="level1.html">Try Again');
		}
	}
	return false;
}

window.addEventListener('load',init,false);
