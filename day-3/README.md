# Daily Challenge 3: PHP Library Loan Checker

**Estimated time**: 30 minutes

**Level**: Beginner, slightly harder

**Objective**: Practise PHP functions, associative arrays, conditionals, calculations, and structured return values.

---
Create this function:
```php
function checkLoan(array $loan): array
```

The input contains:
```php
$loan = [
    "title" => "The Hobbit",
    "daysBorrowed" => 21,
    "allowedDays" => 14,
    "dailyRate" => 0.35
];
```
---
Requirements:
* Calculate how many days overdue the book is.
* Never allow overdue days to be negative.
* Charge `dailyRate` for every overdue day.
* Cap the late fee at £10.
* Round the fee to two decimal places.
* Set the status to `"On time"` or `"Overdue"`.
* Return an associative array containing `title`, `status`, `overdueDays`, and `fee`.
* Do not print from inside the function.

For the example above, the result should be:
```php
[
    "title" => "The Hobbit",
    "status" => "Overdue",
    "overdueDays" => 7,
    "fee" => 2.45
]
```

Test these cases too:
* A book returned before its allowance.
* A book returned exactly on time.
* A sufficiently overdue book whose fee reaches the £10 cap.
---
**Optional hint**: Calculate the overdue days first, then use `min()` when calculating the capped fee.