<?php
// ======================================
// Number Analyzer - Console-Based App
// Written in PHP
// ======================================

// Main heading displayed when the program starts
echo "📊 Welcome to the Number Analyzer!\n";
echo "Analyze a set of numbers to get max, min, sum, and average.\n\n";

// Infinite loop to keep the program running until the user types 'exit'
while (true) {

    echo "Enter a list of numbers separated by spaces (or type 'exit' to quit): ";
    $input = trim(fgets(STDIN)); // Read input from the console

    // Check if the user wants to exit the program
    if (strtolower($input) === 'exit') {
        echo "👋 Thank you for using Number Analyzer. Goodbye!\n";
        break;
    }

    // Split the input string into an array using spaces
    $inputArray = preg_split('/\s+/', $input);

    // Initialize an empty array to store valid numbers
    $numbers = [];


    $isValid = true;

    // Validate each item in the input array
    foreach ($inputArray as $value) {
        if (is_numeric($value)) {
            $numbers[] = floatval($value);
        } else {
            $isValid = false;
            break;
        }
    }

    if (!$isValid) {
        echo "❌ Error: Please enter only numbers separated by spaces.\n\n";
        continue;
    }

    // Perform calculations
    $max = max($numbers);
    $min = min($numbers);
    $sum = array_sum($numbers);
    $count = count($numbers);
    $average = $sum / $count;

    // Display the results
    echo "\n=== Analysis Results ===\n";
    echo "Maximum Number : $max\n";
    echo "Minimum Number : $min\n";
    echo "Total Sum      : $sum\n";
    echo "Average        : " . round($average, 2) . "\n";
    echo "========================\n\n";
}
