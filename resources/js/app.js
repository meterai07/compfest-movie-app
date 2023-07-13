import "./bootstrap";

const dropdownButton = document.getElementById("dropdownButton");
const dropdownMenu = document.getElementById("dropdownMenu");

dropdownButton.addEventListener("click", () => {
    dropdownMenu.classList.toggle("hidden");
});

window.addEventListener("click", (event) => {
    const targetElement = event.target;
    if (
        !targetElement.closest("#dropdownMenu") &&
        !targetElement.closest("#dropdownButton")
    ) {
        dropdownMenu.classList.add("hidden");
    }
});

const seats = document.querySelectorAll(".seat");
const selectedSeatsContainer = document.getElementById("selected-seats");
const selectedSeatsInput = document.getElementById("selected-seats-input");
const selectedSeats = [];

seats.forEach((seat) => {
    seat.addEventListener("click", () => {
        seat.classList.toggle("bg-blue-400");
        seat.classList.toggle("bg-red-400");

        const seatNumber = seat.getAttribute("id");

        if (selectedSeats.includes(seatNumber)) {
            const seatIndex = selectedSeats.indexOf(seatNumber);
            if (seatIndex !== -1) {
                selectedSeats.splice(seatIndex, 1);
            }
            // totalPrice -= seatPrice; // Subtract seat price when deselected
        } else {
            selectedSeats.push(seatNumber);
            // totalPrice += seatPrice; // Add seat price when selected
        }

        const selectedSeatsText = selectedSeats.join(", ");
        selectedSeatsContainer.innerHTML = selectedSeatsText;
        selectedSeatsInput.value = JSON.stringify(selectedSeats);

        // const totalPriceElement = document.getElementById("total-price");
        // totalPriceElement.textContent = "$" + totalPrice;
    });
});
