console.log('script.js');

function imgError(e) {
  // alert(1);
  console.log(e);
}

TOTAL = 0;
let orderedFood = document.querySelector('#orderedFood');
function selectFood(e, current){
  // console.log(e, current);
  let foodId = e.target.id;
  let id = e.target.id.split('_')[1];
  let price = +e.target.dataset.price;
  // console.log(price);
  // console.log(current.checked);
  if(current.checked) {
    TOTAL += price;
    let inputHidden = '';
    document.querySelectorAll('.foodCheckbox:checked').forEach(el => {
      document.querySelector('#bookFood').disabled = false;
      inputHidden += `<input name="foodId[]" type="hidden"  value="${el.id.split('_')[1]}">`;
    });
    orderedFood.innerHTML = '';
    orderedFood.innerHTML = inputHidden;
  } else {
    TOTAL -= price;
  }
  document.querySelector('#totalCost').innerHTML = TOTAL;
};

// document.addEventListener('submit', e => {
//   e.preventDefault();
// })

function removeRow(e, current) {
  e.preventDefault();
  // console.log(current.parentElement.parentElement);
  // console.log(current.parentElement.parentElement.parentElement);
  current.parentElement.parentElement.parentElement.remove();
  // console.log(e);
}


const toggleEditForm = e => {
  // document.querySelector('#edit-btn').classList.toggle('hide-ele');
  document.querySelectorAll('.edit-form').forEach(el => {
    el.classList.toggle('hide-ele');
  })
}