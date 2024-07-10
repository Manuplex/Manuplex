var text=document.getElementById('link_tocut').text,
button=document.getElementById('copy_board');


button.addEventListener("click",()=>{
   var mytext=text.select();
    navigator.clipboard.writetext(mytext);
    text.setSelectionRange(0,0);
    alert('Le lien a bien été copié');
});