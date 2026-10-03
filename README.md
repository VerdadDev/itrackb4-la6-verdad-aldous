Lab Activity 6

#Answers

Q1 Your form sends data with POST rather than GET. Explain what would go wrong if it used GET instead. Your answer should say something about what a browser does when a page is refreshed.

 - When use the Get instead of POST the input it will just go to URL.

Q2 When validation fails, your controller does not run the code that saves the record — and you did not write an if statement to stop it. Explain what actually stops it, and where the visitor ends up.

 - the laravel stop it and the save part does not run it will just go back to form and see errors.

Q3 Your success message is displayed from the layout, which renders on every page. Explain why it does not appear on every page.

 - It only display in list page because when you finish storing the data because the list page is main pag eit go first to see the new added data.