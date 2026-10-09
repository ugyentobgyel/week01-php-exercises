# Week 2 Logic Exercises - PHP

Royal Institute of Management
Diploma in Information Technology
Full Stack Web Development

## Files

- `data.php` - contains the exact 8 exercise records.
- `helpers.php` - reusable functions for the exercises.
- `ex1.php` - Predict the output.
- `ex2.php` - Busiest Dzongkhag.
- `ex3.php` - Reference numbers.
- `ex4.php` - Waiting-time alert.
- `ex5.php` - Status rules.
- `ex6.php` - Find the bugs.
- `ex7.php` - Duplicate and invalid CIDs.

## How to run in VS Code

1. Extract the ZIP file.
2. Open the extracted folder in VS Code.
3. Make sure PHP is installed.
4. Open the VS Code terminal.
5. Run one exercise at a time:

```bash
php ex1.php
php ex2.php
php ex3.php
php ex4.php
php ex5.php
php ex6.php
php ex7.php
```

## Run in a browser

If PHP is installed, from the project folder run:

```bash
php -S localhost:8000
```

Then open:

`http://localhost:8000/ex1.php`

Change `ex1.php` to `ex2.php`, `ex3.php`, etc.

## Expected key results

Exercise 2:
`Busiest: Paro (2 pending)`

Exercise 4:
- #1 Pema Wangmo — 23 days — Overdue
- #2 Sonam Dorji — 17 days — Overdue
- #5 Kinley Om — 8 days — Follow up
- #6 Ugyen Dorji — 4 days — On time
- #7 Yeshi Lhamo — 21 days — Overdue
- 3 overdue · 1 follow up · 1 on time

Exercise 6:
`Pending requests: 5`

Exercise 7:
- Duplicate 10101001234: requests 1, 4
- Duplicate 11205002345: requests 3, 7
- Invalid CID in request 2: 1010100123
- Invalid CID in request 6: 1150200A678

## Important

The exercise sheet asks students to think first, write steps as comments, and verify the output. The code in this project includes comments explaining the important logic so it is easier to study and understand.
