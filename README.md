# workoutmanagement

To All users :
1.	Login : As the user registered as fitness member by the manager, it will create a web_id and password automatically. Web_id will be their [initial of first name_lastname_id/10000+id%10]. Their password will be initialized as their phone number. It will check if their Id and password are matching as they have in the database. After they login, there will be three different template that will assign differently depends on user’s type(customer, trainer, and manager).


Functions after login :
1.	Change Their base information :  The user will be able to change their base information such as their phone number or address, but not their name, ssn, age, or sex since it shouldn’t be changed.
2.	Change password : The user will be able to change their password. It will have three different fields of current pw, new pw, and new pw for the second time to match. If their current pw is not matching with current one, it will pop up the error message and will not execute. Also, their new password must be different than the current one and their new passwords will have to match. Once it fulfills all the condition, it will then change the password.
3.	Logout : User can logout of their account, it will clear the cache thus, backward button will not show their account info but just showing the login screen.



For Manager :
1.	Add new users with their type : Manager will add the users depends on their user type. There will be three radio buttons that will specify each type of user. There is an event on each radio button, so each radio button will pop up different text field to type in. There are some field that should be numbers only or has maximum length( phone, ssn, zip_code). These were handled using the Jquery.
2.	Requested food from the customer : When user adds the food they have eaten, they can only choose the food that is already on the database. (To reduce the duplicate names as well as each food has nutrition data to it). Once user ate the food that is not on the database, they can request the food by just typing the name of the food. Then, it will be sent to the req_food of database instead of cust_eats_food. Then, manager will access to this req_food and has responsibility to add them to the system with some additional nutrition information to it. Once they finishing entering the nutrition info, they can submit it. Only the checked row will be submitted. Then, inside the dbms, it will add the new food with that info, then it will add it to cust_eats_food, then it will remove it from the req_food.
3.	Manage Food : Manager can edit or remove the food that is on the database. They can simply do that by checking the checkbox that they wish to edit or remove. Textbox will be readonly unless they check the update checkbox of that row. They can check only one of them. If they attempt to check one and check the other one of that row, it will uncheck the previous one. Once they submit, only the checked row information will be sent to dbms.
4.	Add new food : Manager can add the new food to the system if they want to. It will let you add more rows/ delete rows so that they can submit all at once. 
5.	Manage workout : It has pretty much same functionality as the manage food. They can select which to update/remove workout method from the database.
6.	Add new workout : It has same functionality as add food but adding new workout method.
For Trainer :
1.	Add workout session : After the workout session with trainer’s customers, trainer has responsible for adding the workout session info to specific customer. Trainer can only access to trainer’s customer not all the customer. They can add multiple workout session just by clicking ‘add more workout’.
2.	Maintain customer : At the end of each day, they have responsibility to update on customer to update their fat and muscle. Based on what they have eaten and exercised for that day. (This would be much better if it was activated every 24 hours inside the database, yet I wasn’t sure to how to do it so I just made it trainer’s responsible.) Once it is submitted, it will get the food and exercise info from the customers on specific day. Then it will do the calculation to determine gained/spent fat and muscle and add/subtract that to the customer’s body stat.
For Customer :
1.	Add the food they have eaten : The customer has responsible to add the food customer ate to the system with corresponding date. Customer have to choose the food that is on the system which means customer can request the other food if it is not on the list. It will be sent to manager and will be taken care of.
2.	Fitness analysis : On specific day, customer can check out the food customer has eaten, workout customer has done and some statistical data based on customer.
3.	Check out Body status : customer can check the status on customer’s body. Like muscle and fat on each part of the customer’s body. It will be changed depends on the food customer eats and workout customer does at the end of the day by customer’s trainer.
