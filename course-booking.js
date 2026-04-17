const seatsInput = document.getElementById('seats');
const totalFeeDisplay = document.getElementById('total-fee');
const errorMsg = document.getElementById('error-msg');
const discountMsg = document.getElementById('discount-msg');

const classType = document.getElementById('class-type');
const extraFeeDisplay = document.getElementById('extra-fee');
const finalAmountDisplay = document.getElementById('final-amount');

const confirmCheckbox = document.getElementById('confirm-checkbox');
const submitBtn = document.getElementById('submit-btn');

const feePerSeat = 500;
const discountLimit = 5000;

function calculateFees() {
  let seats = parseInt(seatsInput.value);

  if (isNaN(seats) || seats <= 0) {
    errorMsg.style.display = 'block';
    seatsInput.value = 1;
    seats = 1;
  } else {
    errorMsg.style.display = 'none';
  }

  const totalFee = seats * feePerSeat;
  totalFeeDisplay.textContent = totalFee + ' Tk';

  if (totalFee > discountLimit) {
    discountMsg.style.display = 'block';
  } else {
    discountMsg.style.display = 'none';
  }

  updateFinalAmount(totalFee);
}

function updateFinalAmount(totalFee) {
  let extraFee = 0;

  if (classType.value === 'online') {
    extraFee = 100;
  } else if (classType.value === 'oncampus') {
    extraFee = 250;
  }

  extraFeeDisplay.textContent = extraFee + ' Tk';
  finalAmountDisplay.textContent = (totalFee + extraFee) + ' Tk';
}

seatsInput.addEventListener('input', calculateFees);


classType.addEventListener('change', function () {
  const seats = parseInt(seatsInput.value) || 1;
  const totalFee = seats * feePerSeat;
  updateFinalAmount(totalFee);
});

confirmCheckbox.addEventListener('change', function () {
  if (confirmCheckbox.checked) {
    submitBtn.style.display = 'block';
  } else {
    submitBtn.style.display = 'none';
  }
});

calculateFees();