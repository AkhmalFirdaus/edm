The `<span>` element in HTML is an inline container used to apply styles or manipulate a small part of the text or other inline elements within a block-level element. Unlike block-level elements like `<div>`, which start on a new line and take up the full width available, `<span>` does not disrupt the flow of text or layout; it simply allows you to group and style text or inline elements.

### Key Characteristics of `<span>`

1. **Inline Element**: `<span>` is an inline element, which means it does not start on a new line. It only takes up as much width as its content requires and flows with the surrounding text.

2. **Styling and Identification**: It’s often used to apply styles to a portion of text or to group inline elements for JavaScript manipulation.

3. **No Semantic Meaning**: `<span>` does not add any semantic meaning to the content. It’s purely a container for styling or scripting purposes.

### Basic Usage

Here’s an example of using `<span>` to style a part of a text:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example of span</title>
    <style>
        .highlight {
            background-color: yellow;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <p>This is an example of using a <span class="highlight">highlighted text</span> within a paragraph.</p>
</body>
</html>
```

In this example:
- The `<span>` with the class `highlight` applies a yellow background and bold font to the text “highlighted text”.

### Use Cases

1. **Styling Part of Text**: When you need to apply specific styles to a portion of text within a block-level element, such as a paragraph.

2. **JavaScript Manipulation**: To manipulate or access specific parts of the text in scripts. For example, adding event listeners or changing text content dynamically.

3. **Grouping Inline Elements**: Grouping inline elements (e.g., small pieces of text or icons) for collective styling or manipulation.

### Comparison with `<div>`

- **`<div>`**: Block-level, starts on a new line, takes up the full width available.
- **`<span>`**: Inline-level, does not start on a new line, only takes up as much width as needed.

### Example in a Table Header

In the context of a table header, `<span>` can be used to add sorting arrows or other visual indicators without disrupting the layout of the table:

```html
<th>
    Name <span class="sort-arrow"></span>
</th>
```

In this example, the `<span>` element with the class `sort-arrow` can be styled to show an arrow indicating the sorting direction. This allows you to place the arrow directly next to the column header text without affecting the table's layout.

### Summary

- The `<span>` element is a versatile inline container used primarily for styling and scripting.
- It does not add any semantic meaning but helps in applying styles or JavaScript interactions to parts of text or inline elements.
- It is ideal for grouping and manipulating small portions of content within a block-level element.