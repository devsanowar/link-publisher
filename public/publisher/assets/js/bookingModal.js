// const modal = document.getElementById("appointmentModal");
// const openBtn = document.getElementById("openModal");
// const closeBtn = document.getElementById("closeModal");

// openBtn.addEventListener("click", function (e) {
//   e.preventDefault();
//   modal.style.display = "flex";
// });

// closeBtn.addEventListener("click", function () {
//   modal.style.display = "none";
// });

// window.addEventListener("click", function (e) {
//   if (e.target === modal) {
//     modal.style.display = "none";
//   }
// });

// ========== Appointment Modal ==========
const appointmentModal = document.getElementById("appointmentModal");
const openAppointmentBtn = document.getElementById("openModal");
const closeAppointmentBtn = document.getElementById("closeModal");

openAppointmentBtn.addEventListener("click", function (e) {
  e.preventDefault();
  appointmentModal.style.display = "flex";
});

closeAppointmentBtn.addEventListener("click", function () {
  appointmentModal.style.display = "none";
});

window.addEventListener("click", function (e) {
  if (e.target === appointmentModal) {
    appointmentModal.style.display = "none";
  }
});
