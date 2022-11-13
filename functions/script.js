function func(k) {
  let s = k.toString();
  let li = document.getElementById(s);
  let collection = li.children;
  console.log(collection[0]);
  let ids = collection[1].children;
  let li_child = ids[0];
  li_child.style.display = "block";
  let span = collection[0];
  span.style.display = "none";
}
function func2(k) {
  let s = k.toString();
  let li = document.getElementById(s);
  let collection = li.children;
  let ids = collection[1].children;
  let li_child = ids[0];
  li_child.style.display = "block";
  let span = collection[0];
  span.style.display = "none";
}
