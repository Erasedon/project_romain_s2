
$('.toggle').on('click', function() {
	$('.container').stop().addClass('active');
	document.getElementById("pen-title").style.display = 'none';
	document.getElementById("pen-title2").style.display = 'block';
  });
  
  $('.close').on('click', function() {
	$('.container').stop().removeClass('active');
		document.getElementById("pen-title2").style.display = 'none';
		document.getElementById("pen-title").style.display = 'block';
  });
 

  function DoubleCheck() {
	MDP1 = document.getElementById('mdp1');
	MDP2 = document.getElementById('mdp2');
	MAIL1 = document.getElementById('mail1');
	MAIL2 = document.getElementById('mail2');
	Sub = document.getElementById('submit');

	if (MDP1.value == MDP2.value && MAIL1.value == MAIL2.value) 
	{	
		Sub.disabled = false;
		if (MDP1.value.length > 0)
		{
			MDP2.style.borderColor = "green";
		}
		if (MAIL1.value.length > 0)
		{
			MAIL2.style.borderColor = "green";
		}
	}
	else 
	{
		if (MDP1.value.length > 0 && MDP1.value != MDP2.value)
		{
			MDP2.style.borderColor = "solid red";
		}
		if (MAIL1.value.length > 0 && MAIL1.value != MAIL2.value)
		{
			MAIL2.style.borderColor = "red";
		}
		Sub.disabled = true;
	};
};
	document.getElementById('mail2').onpaste = function(){
    alert('Merci de ne pas copier/coller');        // on prévient
    return false;        // on empêche
};
