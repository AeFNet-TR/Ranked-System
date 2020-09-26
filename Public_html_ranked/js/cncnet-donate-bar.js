(function()
{var donateBar=document.querySelector(".donate");var closeBtn=document.querySelector(".close-donate");closeBtn.addEventListener("click",function(e)
{e.preventDefault();Cookies.set('donate','hidden',{expires:30});hideDonateBar();},false);function hideDonateBar()
{if(Cookies.get('donate')!=null)
{donateBar.classList.add("hidden");}
else
{donateBar.classList.remove("hidden");}}
hideDonateBar();})();