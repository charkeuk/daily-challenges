# Daily Challenge 8: JavaScript JSON Order Summary

**Estimated time**: 30 minutes

**Level**: Beginner to intermediate

**Objective**: Practise parsing JSON and using `Array.reduce()` to validate records and build a summary.

---

Write a function named `summariseOrders(ordersJson)` that accepts this JSON string:

```javascript
const ordersJson = `[
  {"customer":"Maya","quantity":2,"price":12.50},
  {"customer":"Leo","quantity":1,"price":20},
  {"customer":"Maya","quantity":3,"price":5},
  {"customer":"","quantity":2,"price":8},
  {"customer":"Nora","quantity":0,"price":15}
]`;
```

Your function should:

1. Parse the JSON using `JSON.parse()`.
2. Use one `reduce()` operation to process the orders.
3. Treat an order as valid only when:
   - `customer` is not empty.
   - `quantity` is greater than `0`.
   - `price` is greater than `0`.
4. Return an object containing the number of valid and skipped orders, the total number of valid items, and the total revenue from valid orders.

`totalRevenue` is the sum of `quantity * price` for valid orders only.

---

**Expected output**:

```javascript
{
  validOrders: 3,
  skippedOrders: 2,
  totalItems: 6,
  totalRevenue: 60
}
```

**Completion criteria**:

* The JSON is parsed with `JSON.parse()`.
* Invalid orders are excluded from the item and revenue totals.
* All four summary values are calculated during one `reduce()` operation.
* The function returns zero totals when the input contains no valid orders.
* The totals are calculated from the supplied data rather than hard-coded.

---

**Optional hints**:

* Give `reduce()` an accumulator with all four properties initialized to `0`.
* Check whether an order is valid before updating the item and revenue totals.
* For an invalid order, increment only `skippedOrders`.
