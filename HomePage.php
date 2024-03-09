<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
<style>
    body {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
    margin: 0;
    padding: 0;
    background-color: black; /* Light yellow background */
}

.navbar {
    background-color: #ffd700; /* Darker shade of yellow */
    padding: 10px 20px; /* Increased padding for better spacing */
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Bigger shadow effect */
    display: flex;
    justify-content: space-between; /* Align items to the ends */
    align-items: center; /* Center vertically */
}

.navbar ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex; /* Use flexbox for horizontal alignment */
}

.navbar ul li {
    margin-right: 50px; /* Larger gaps between items */
    transition: transform 0.2s; /* Smooth transition for transformation */
}

.navbar ul li:last-child {
    margin-right: 0; /* Remove margin for the last item */
}

.navbar ul li a {
    text-decoration: none;
    color: black; /* black font color */
    font-size: 16px;
}

.navbar ul li a {
        text-decoration: none;
        color: black; /* black font color */
        font-size: 16px;
    }
    .navbar ul li a:hover, .navbar ul li a:focus {
        transform: scale(1.1); /* Enlarge the item slightly on hover or click */
    }
 

.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center; /* Align items horizontally and vertically to the center */
    margin-top: 20px; /* Reduced margin for better alignment with navbar */
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.options {
    display: flex;
    justify-content: space-around;
    margin-bottom: 20px;
}

button {
    padding: 10px 20px;
    margin: 10px;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    background-color: black; /* Light yellow button background */
    color: yellow;
    font-size: 16px;
}

button:hover {
    background-color: #e6b800; /* Darker yellow on hover */
}

#savings-menu,
#expenses-menu {
    display: none;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

#savings-menu input,
#expenses-menu input {
    padding: 8px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    width: 200px;
    font-size: 16px; /* Adjust font size */
    color: #333; /* Text color */
    background-color: #f9f9f9; /* Background color */
}

#savings-menu input:focus,
#expenses-menu input:focus {
    outline: none; /* Remove outline on focus */
    border-color: #66afe9; /* Change border color on focus */
    box-shadow: 0 0 5px #66afe9; /* Add a subtle shadow on focus */
}

#savings-menu button,
#expenses-menu button {
    padding: 10px 20px;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    background-color: black; /* Green button background */
    color: yellow;
    font-size: 16px;
}

#savings-menu button:hover,
#expenses-menu button:hover {
    background-color: bla; /* Darker green on hover */
}

#notification-container {
    width: 100%;
    display: flex;
    justify-content: center;
    margin-bottom: 10px;
}

.notification {
    padding: 10px;
    border-radius: 5px;
    margin: 0 5px; /* Add margin for spacing */
    a
}

.savings-notification {
    background-color: #4CAF50; /* Green background for savings notification */
    color: white;
}

.expenses-notification {
    background-color: #FF5733; /* Orange background for expenses notification */
    color: white;
}

#chart-container, huh
#expense-chart-container {
    width: 100%;
    height: 400px;
    margin-top: 20px;
}

.history-buttons {
    margin-top: 0px;
    display: flex;
    justify-content: center;
}

#savings-history,
#expenses-history {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 20px 0;
    overflow-y: auto;
    max-height: 200px; /* Limit max height to enable scrolling if needed */
    display: none; /* Initially hidden */
}

#close-history {
    margin-top: 10px;
    cursor: pointer;
    color: #007bff; /* Blue color for the close button */
}

@media screen and (min-width: 600px) {
    .container {
        padding: 40px;
    }

    #savings-menu,
    #expenses-menu {
        padding: 40px;
    }

    #chart-container {
        width: 600px;
        height: 400px;
        margin-top: 20px;
    }
    #expense-chart-container {
        width: 300px;
        height: 400px;
        display: none; /* Initially hidden */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #savings-history,
    #expenses-history {
        width: 600px;
    }
}

@media screen and (max-width: 600px) {
    .navbar ul li {
        margin-right: 10px; /* Smaller gaps between items for smaller screens */
    }

    .container {
        padding: 20px;
    }

    #savings-menu,
    #expenses-menu {
        padding: 50px;
    }
    

    #chart-container {
        width: 350px;
        height: 300px;
        margin-top: 40px;
    }
    #expense-chart-container {
        width: 300px;
        height: 400px;
        display: none; /* Initially hidden */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #savings-history,
    #expenses-history {
        width: 300px;
    }
}
/* Add design to the expense category buttons */
#expenses-menu select {
    padding: 8px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    width: 200px;
    font-size: 16px; /* Adjust font size */
    color: #333; /* Text color */
    background-color: #f9f9f9; /* Background color */
}

#expenses-menu select:focus {
    outline: none; /* Remove outline on focus */
    border-color: #66afe9; /* Change border color on focus */
    box-shadow: 0 0 5px #66afe9; /* Add a subtle shadow on focus */
}

/* Add specific styling for each expense category */
#expenses-menu select option[value="food"] {
    background-color: #ffcccb; /* Light red for food */
}

#expenses-menu select option[value="transportation"] {
    background-color: #add8e6; /* Light blue for transportation */
}

#expenses-menu select option[value="academic"] {
    background-color: #90ee90; /* Light green for academic */
}
</style>
</head>
<div class="navbar">
    <ul>
        <li id="home" class="active"><a href="homepage1.html"><img src="/images/logo1.png" alt="Home"></a></li>
    </ul>
    <ul>
        <li><a href="notes.html">Notes</a></li>
        <li><a href="tips.html">Tips</a></li>
        <li><a href="about.html">About Us</a></li>
        <li><a href="account.html">Account</a></li>
    </ul>
</div>
<div class="container">
    <div class="options">
        <button id="show-savings" onclick="showSavings()">Savings</button>
        <button id="show-expenses" onclick="showExpenses()">Expenses</button>
    </div>
    <div id="savings-menu">
        <input type="number" id="saving-amount" placeholder="Enter savings amount">
        <input type="number" id="saving-day" placeholder="Enter day">
        <button onclick="addSaving()">Add Savings</button>
        <div>Total Savings: <span id="total-savings">0</span></div>
    </div>
    <div id="expenses-menu">
        <input type="number" id="expense-amount" placeholder="Enter expense amount">
        <input type="number" id="expense-day" placeholder="Enter day">
        <select id="expense-category">
            <option value="food">Food</option>
            <option value="transportation">Transportation</option>
            <option value="academic">Academic</option>
        </select>
        <button onclick="addExpense()">Add Expense</button>
        <div>Total Expenses: <span id="total-expenses">0</span></div>
    </div>
    <div id="notification-container"></div>
    <div id="chart-container">
        <canvas id="chart"></canvas>
    </div>
    <div id="expense-chart-container">
        <canvas id="expense-chart" width="300" height="300"></canvas>
    </div>
    <div class="history-buttons">
        <button id="toggle-savings-history" onclick="toggleHistory('savings')">Toggle Savings History</button>
        <button id="toggle-expenses-history" onclick="toggleHistory('expenses')">Toggle Expenses History</button>
    </div>
    <div id="savings-history"></div>
    <div id="expenses-history"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let savings = [];
    let expenses = [];
    let totalSavings = 0;
    let totalExpenses = 0;
    let chart;
    let expenseChart;
    let notificationCount = 0;

    function showSavings() {
        document.getElementById('savings-menu').style.display = 'block';
        document.getElementById('expenses-menu').style.display = 'none';
        document.getElementById('chart-container').style.display = 'block';
        document.getElementById('expense-chart-container').style.display = 'none';
    }

    function showExpenses() {
        document.getElementById('savings-menu').style.display = 'none';
        document.getElementById('expenses-menu').style.display = 'block';
        document.getElementById('chart-container').style.display = 'block';
        document.getElementById('expense-chart-container').style.display = 'block';
    }

    function addSaving() {
        const savingAmount = parseFloat(document.getElementById('saving-amount').value);
        const day = parseInt(document.getElementById('saving-day').value);
        if (!isNaN(savingAmount) && !isNaN(day) && day > 0) {
            if (!savings[day]) {
                savings[day] = savingAmount;
            } else {
                savings[day] += savingAmount;
            }
            totalSavings += savingAmount;
            document.getElementById('total-savings').textContent = totalSavings.toFixed(2);
            showNotification(`${savingAmount} is added to your Day ${day} Savings!`, 'savings-notification');
            updateChart();
        }
    }

    function addExpense() {
        const expenseAmount = parseFloat(document.getElementById('expense-amount').value);
        const day = parseInt(document.getElementById('expense-day').value);
        const category = document.getElementById('expense-category').value;
        if (!isNaN(expenseAmount) && !isNaN(day) && day > 0) {
            if (!expenses[day]) {
                expenses[day] = {};
                expenses[day][category] = expenseAmount;
            } else {
                if (!expenses[day][category]) {
                    expenses[day][category] = expenseAmount;
                } else {
                    expenses[day][category] += expenseAmount;
                }
            }
            totalExpenses += expenseAmount;
            document.getElementById('total-expenses').textContent = totalExpenses.toFixed(2);
            showNotification(`${expenseAmount} is added to your Day ${day} ${category} Expenses!`, 'expenses-notification');
            updateChart();
            updateExpenseChart();
        }
    }

    function showNotification(message, type) {
        notificationCount++;
        const notificationContainer = document.getElementById('notification-container');
        const notification = document.createElement('div');
        notification.textContent = message;
        notification.classList.add('notification');
        notification.classList.add(type);
        notificationContainer.appendChild(notification);
        setTimeout(() => {
            notification.remove();
            notificationCount--;
        }, 3000);

        // Add the notification to history
        const history = type === 'savings-notification' ? document.getElementById('savings-history') : document.getElementById('expenses-history');
        const notificationItem = document.createElement('div');
        notificationItem.textContent = message;
        history.appendChild(notificationItem);
    }

    function updateChart() {
        const ctx = document.getElementById('chart').getContext('2d');
        if (chart) {
            chart.destroy();
        }
        chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: Object.keys(savings).map(day => `Day ${day}`),
                datasets: [{
                    label: 'Savings',
                    data: Object.values(savings),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Expenses',
                    data: Object.values(expenses).map(day => day ? Object.values(day).reduce((acc, cur) => acc + cur, 0) : 0),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function updateExpenseChart() {
        const ctx = document.getElementById('expense-chart').getContext('2d');
        if (expenseChart) {
            expenseChart.destroy();
        }
        expenseChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Food', 'Transportation', 'Academic'],
                datasets: [{
                    label: 'Expenses',
                    data: [
                        expenses.reduce((acc, day) => acc + (day && day.food ? day.food : 0), 0),
                        expenses.reduce((acc, day) => acc + (day && day.transportation ? day.transportation : 0), 0),
                        expenses.reduce((acc, day) => acc + (day && day.academic ? day.academic : 0), 0)
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    }

    function toggleHistory(type) {
        const history = document.getElementById(`${type}-history`);
        history.style.display = history.style.display === 'block' ? 'none' : 'block';
    }

    function closeHistory() {
        document.getElementById('savings-history').style.display = 'none';
        document.getElementById('expenses-history').style.display = 'none';
    }
</script>
</body>
</htm