<script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
$(function() {
    //alert($("#titre").text());
    
  });
  // var typed = new Typed('#element', {
  //   strings: ['Fontend dev', 'Backend dev'],
  //   typeSpeed: 50,
  // });
const typed = new Typed('.multiple-text',
{
  Strings : ['Fontend dev', 'Backend dev'],
  typeSpeed : 100,
  backSpeed : 100,
  backDelay : 1000,
  loop : true
});

const element = document.querySelector('.ball');

tween({ to: 300, duration: 500 })
  .start((v) => element.style += 'translateX(' + v + 'px)');