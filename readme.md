# Expense Tracker CLI - PHP Application with symfony/console package (Inspired by roadmap.sh)

A simple expense tracker CLI application built with **PHP** using the **Symfony/Console** package to help you manage your finances. The application allows users to add, delete, view, and summarize their expenses directly from the command line. Track your expenses, stay on top of your budget, and gain insight into your spending habits with ease!

## Features:

- **Add, Update, Delete an expense**
- **View all expenses**
- **View full summary and monthly summary**
- **Add expense categories**
- **Get, Set, Delete a monthly budget**
- **Export to CSV File**

**Project Details**: https://roadmap.sh/projects/expense-tracker

## The list of commands and their usage is given below:

- Add a new expense
```bash
   php expense-tracker add --description=Dinner --amount=50 --category=Food
```

- Updating and deleting expenses
```bash
   php expense-tracker update --id=1 --description=Lunch  --amount=175 --category=food
   php expense-tracker delete --id=1
```

- Get, Set, Delete Budget of each month
```bash
   php expense-tracker budget:get
   php expense-tracker budget:set --month=4 --amount=5000
   php expense-tracker budget:delete --month=4
```

- Listing all expenses or filter by **category**
```bash
   php expense-tracker list
   php expense-tracker list  --category=food
```
- Summarize all expenses or filter by **month**
```bash
   php expense-tracker summary
   php expense-tracker summary --month=8
```

- Export expenses as CSV file
```bash
   php expense-tracker csv
```


## Installation

**You need PHP and Composer installed**
1. Clone the repository to your local machine:

   ```bash
   git clone https://github.com/mdahanaf/Expense-Tracker.git
   ```
2. Run this command to install composer packages
     
   ```bash
   composer update
   ```

3. And done. Now you can easily add your expense via CLI 🚀
     
   ```bash
   php expense-tracker add --description=Dinner --amount=50 --category=Food
   ```
  