   // JavaScript to control modal behavior
   document.getElementById('openModal').addEventListener('click', function () {
    document.getElementById('myModal').classList.add('active');
});

// Close modal when clicking outside the modal content
window.onclick = function (event) {
    var modal = document.getElementById('myModal');
    if (event.target == modal) {
        modal.classList.remove('active');
    }
};

// Form validation
document.getElementById('myForm').addEventListener('submit', function (event) {
    var name = document.getElementById('name').value.trim();
    var email = document.getElementById('email').value.trim();
    var mobile = document.getElementById('mobile').value.trim();
    if (name === '' || email === '' || mobile === '') {
        alert('Please fill in all fields.');
        event.preventDefault(); // Prevent form submission
    }
});

var swiper = new Swiper(".mySwiper", {
    effect: "cards",
    grabCursor: true,
});