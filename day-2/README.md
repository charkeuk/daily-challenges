# Daily Challenge 2: JavaScript Mini Shopping Basket

**Estimated time**: 30 minutes

**Level**: Beginner

**Objective**: Practise functions, arrays, objects, loops, conditionals, and basic arithmetic.

---
Create a function named ```calculateBasket(items)```.

Each item has:
* ```name```
* ```price```
* ```quantity```
---
Your function must:
1. Calculate each item’s cost: ```price × quantity```.
2. Add those costs to find the subtotal.
3. Apply a 10% discount when the subtotal is £20 or more.
4. Return an object containing ```subtotal```, ```discount```, and ```total```.
5. Round every returned amount to two decimal places.

Example input:
```javascript
const items = [
  { name: "Notebook", price: 4.5, quantity: 2 },
  { name: "Pen", price: 1.25, quantity: 3 },
  { name: "Backpack", price: 18, quantity: 1 }
];

console.log(calculateBasket(items));
```

Expected output:
```
{
  subtotal: 30.75,
  discount: 3.08,
  total: 27.67
}
```
---
#### Completion criteria
Your function produces the correct result for the example, handles an empty basket, and works both below and above the £20 discount threshold.

**Optional hint**: Build the subtotal first. Afterwards, use an ```if``` statement to decide whether the discount is ```subtotal * 0.10``` or ```0```.