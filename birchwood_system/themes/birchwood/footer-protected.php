</main>

<?php wp_footer(); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Find all Gravity Forms submit buttons
    const submitInputs = document.querySelectorAll('.gform_wrapper input[type="submit"]');
    
    submitInputs.forEach(function(input) {
        // Get the input's properties
        const inputValue = input.value;
        const inputClasses = input.className;
        const inputId = input.id;
        const inputForm = input.form;
        
        // Create new button with text directly inside
        const newButton = document.createElement('button');
        newButton.type = 'submit';
        newButton.className = inputClasses;
        newButton.id = inputId;
        
        // Add text directly to button (not in a span)
        newButton.appendChild(document.createTextNode(inputValue));
        
        // Create arrow icon span
        const arrowSpan = document.createElement('span');
        arrowSpan.className = 'arrow-icon';
        
        // Append arrow span to button
        newButton.appendChild(arrowSpan);
        
        // Replace input with button
        input.parentNode.replaceChild(newButton, input);
    });
});

  </script>
</body>
</html>