var beds=document.getElementById('bed');
var j=1;
function bedInc(){
  if(j<=7327){
    beds.innerHTML = j + "+";
    j+=10;
  }
}

for(i=1;i<=1;i++)
{
    setInterval(bedInc,10);
}

var doc=document.getElementById('doctor');
var d=1;
function docInc(){
  if(d<=220){
    doc.innerHTML = d + "+";
    d+=1;
  }
}

for(i=1;i<=1;i++)
{
    setInterval(docInc,32);
}

var staff=document.getElementById('staff');
var s=1;
function staffInc(){
  if(s<=1703){
    staff.innerHTML = s + "+";
    s+=2;
  }
}

for(i=1;i<=1;i++)
{
    setInterval(staffInc,10);
}
