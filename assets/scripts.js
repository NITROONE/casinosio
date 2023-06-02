let selectedBet = 0;
let selectedColor = '';
let spinning = false;
let lastSpins = [];

function selectBet(amount) {
    selectedBet = amount;
    document.getElementById('placeBet').disabled = false;
}

function selectColor(color) {
    selectedColor = color;
    document.getElementById(`bet-${color}`).classList.add('selected');
    document.querySelectorAll('.color-buttons button')
      .forEach(button => {
        if (button.id !== `bet-${color}`) {
          button.classList.remove('selected');
        }
      });
}

function placeBet() {
    if (selectedBet > 0 && selectedColor) {
        document.getElementById('spin').disabled = false;
        document.getElementById('placeBet').disabled = true;
    }
}

function updateLastSpinsDisplay() {
    const lastSpinsElement = document.querySelector('#lastSpins tbody');
    lastSpinsElement.innerHTML = '';

    lastSpins.forEach(spin => {
        const spinResultElement = document.createElement('tr');
        const spinNumberElement = document.createElement('td');
        const spinColorElement = document.createElement('td');

        spinNumberElement.textContent = spin.number;
        spinColorElement.textContent = spin.color;
        spinColorElement.style.color = spin.color === 'rouge' ? 'red' : spin.color === 'noir' ? 'black' : 'green';

        spinResultElement.appendChild(spinNumberElement);
        spinResultElement.appendChild(spinColorElement);
        lastSpinsElement.appendChild(spinResultElement);
    });
}

function spin() {
    if (!spinning) {
        spinning = true;
        const roulette = document.getElementById('roulette');
        const fullRotations = 5;
        const randomRotation = Math.floor(Math.random() * 360);
        const totalRotation = 360 * fullRotations + randomRotation;
        roulette.style.transform = `rotate(${totalRotation}deg)`;

        setTimeout(() => {
            spinning = false;
            document.getElementById('spin').disabled = true;
            document.getElementById('placeBet').disabled = false;
            roulette.style.transform = `rotate(${randomRotation}deg)`;

            // Vérification du résultat
            const redSlots = [1, 3, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36];
            const blackSlots = [2, 4, 6, 8, 10, 11, 13, 15, 17, 20, 22, 24, 26, 28, 29, 31, 33, 35];
            const winningNumber = Math.floor(randomRotation / (360 / 37));
            const resultElement = document.getElementById('result');

            let resultColor = '';
            if (redSlots.includes(winningNumber)) {
                resultColor = 'rouge';
                resultElement.style.color = 'red';
            } else if (blackSlots.includes(winningNumber)) {
                resultColor = 'noir';
                resultElement.style.color = 'black';
            } else {
                resultColor = 'vert';
                resultElement.style.color = 'green';
            }

            if (selectedColor === resultColor) {
                resultElement.textContent = `Gagné ! ${winningNumber}-${resultColor}`;
            } else {
                resultElement.textContent = `Perdu :( ${winningNumber}-${resultColor}`;
            }

            // Ajoutez le résultat à la liste des 5 derniers tirages
            lastSpins.unshift({ number: winningNumber, color: resultColor });
            if (lastSpins.length > 5) {
                lastSpins.pop();
            }

            // Mettre à jour l'affichage des 5 derniers tirages
            updateLastSpinsDisplay();
        }, 5000);
    }
}