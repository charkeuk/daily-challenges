# Daily Challenge 1: JavaScript + JSON

**Estimated time**: 30 minutes

**Level**: Beginner

**Objective**: Practise parsing JSON, looping through arrays, filtering values, and calculating a total.

---
You receive this JSON string containing shop orders:

```javascript
const orderJson = `{
  "customer": "Sam",
  "items": [
    { "name": "Notebook", "price": 4.50, "quantity": 2 },
    { "name": "Pen", "price": 1.25, "quantity": 3 },
    { "name": "Backpack", "price": 28.00, "quantity": 1 }
  ]
}`;
```
---
Write JavaScript that:
1. Converts `orderJson` into a JavaScript object.
2. Calculates the total cost of each item.
3. Creates a new array containing only items whose total cost exceeds £5.
4. Calculates the complete order total.
5. Prints this summary:
```
Customer: Sam
Notebook: £9.00
Backpack: £28.00
Order total: £40.75
```
---
#### Completion criteria
* The JSON is parsed with JSON.parse().
* Prices are calculated from price × quantity.
* The filtered results are produced by your code, not manually selected.
* Every displayed monetary value has exactly two decimal places.
* Your code still works if item prices or quantities are changed.

**Optional hint**: Array methods such as filter(), reduce(), and forEach() may help, while toFixed(2) formats a number as currency.