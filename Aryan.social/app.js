  var typed = new Typed(".covertext", {
  strings: ["Welcome","स्वागतम","স্বাগতম","欢迎你来","أهلا وسهل" ,"	Willkommen", "Benvenuti", "ようこそ" , "환영합니다", "Salve", "Bienvenido", "Välkommen", "Hoş geldiniz", "خوش آمديد"],
  typeSpeed: 85,
  backSpeed: 20,
  backDelay: 2000,
  startDelay: 400,
  loop: true,
  showCursor: false,
  cursorChar: "_",
  attr: null,
});

// typed js animation above

$(document).ready(function() {
	$('#pagepiling').pagepiling({
		scrollOverflow:true,
		navigation:false,
	});
});

// plane animation
const flightpath = {
	curviness: 0.25,
	autoRotate: true,
	values : [
	{x:20, y:10},
	{x:20, y:700},
	{x:1450, y:700},
	{x:1450, y:1400},
	{x:20, y:1400},


	]

};

const tween = new TimelineLite();
tween.add(
	TweenLite.to('.plane',1,{
		bezier: flightpath,
		ease: Power1.easeInOut,
	})
);

const controller = new ScrollMagic.Controller();

const scene = new ScrollMagic.Scene({
	triggerElement : '.s3',
	duration:1200,
	triggerHook: 1,

})
.setTween(tween)

.addTo(controller);