# Project Name: Simple Shop
## Project Summary: This project will create a simple e-commerce site for users. Administrators or store owners will be able to manage inventory and users will be able to manage their cart and place orders.

## Github Link: https://github.com/aa2789/IT202-009/tree/prod
## Project Board Link: https://github.com/aa2789/IT202-009/projects/1
## Website Link: https://aa2789-prod.herokuapp.com/Project
## Your Name: Abhi Arun

<!--
### Line item / Feature template (use this for each bullet point)
#### Don't delete this

- [ ] (mm/dd/yyyy of completion) Feature Title (from the proposal bullet point, if it's a sub-point indent it properly)
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show
### End Line item / Feature Template
--> 
### Proposal Checklist and Evidence

- Milestone 1
  - [x] (10/07/2021)User will be able to register a new account
     -  List of Evidence of Feature Completion
       - Status: Completed
       - Direct Link: https://aa2789-prod.herokuapp.com/Project/register.php
       - Pull Requests
         - https://github.com/aa2789/IT202-009/pull/7
       - Screenshots
         - ![image](https://user-images.githubusercontent.com/71272971/140653197-be59b4d1-c6a4-4c3e-952c-5c79e528e459.png)
           - Has form fields of Username, email, password, confirm password 
         - ![image](https://user-images.githubusercontent.com/71272971/140653280-ec7e9086-e66c-4aba-abbf-6708718dd940.png)
           - Email is required
         - ![image](https://user-images.githubusercontent.com/71272971/140653327-9c7a6218-0ffb-4965-b124-dd4c877f11ff.png)
           - Username is required
         - ![image](https://user-images.githubusercontent.com/71272971/140654437-2893b136-9730-4eb1-8c43-e40b5dd02691.png)
           - Passwords must match
         - ![image](https://user-images.githubusercontent.com/71272971/140654564-64ba7c66-a842-4712-93cc-4addf490158d.png)
           - Users Table/Shows that passwords are hashed
         - ![image](https://user-images.githubusercontent.com/71272971/140655523-3032c808-dce7-48e5-a062-13818a52812a.png)
           - User can successfully register
           
         
  - [x] (11/10/2021)User will be able to login to their account (given they enter the correct credentials)
     -  List of Evidence of Feature Completion
       - Status: Completed
       - Direct Link: https://aa2789-prod.herokuapp.com/Project/login.php
       - Pull Requests
         - https://github.com/aa2789/IT202-009/pull/7
         - https://github.com/aa2789/IT202-009/pull/25 ( feature added to login with username as well)
       - Screenshots
         - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
           - User can login with email or username 
         - ![image](https://user-images.githubusercontent.com/71272971/140596887-407db7ec-0e14-463d-9b42-55c3c821fe6e.png)
           - Password Required
         - ![image](https://user-images.githubusercontent.com/71272971/140596918-318f5313-a88e-4ba9-8c62-8d31e90f86f6.png)
           - User should see friendly error messages when an account either doesn’t exist
         - ![image](https://user-images.githubusercontent.com/71272971/140596957-ae3bd177-07bc-4028-b479-ccd8d274ced1.png)
           - User should see friendly error messages if passwords don’t match
         - ![image](https://user-images.githubusercontent.com/71272971/140597039-05b6ca3c-ab2a-47b8-916c-2b78071ad34d.png)
           - Logging in should fetch the user’s details (and roles) and save them into the session.
         - ![image](https://user-images.githubusercontent.com/71272971/140597201-7a45fe7b-3e0a-4862-9948-b124665c60ce.png)
           - User sees all their roles when they login.
         - Code Snippet from login.php= die(header("Location: home.php"));
           - User will be directed to a landing page upon login
  - [x] (11/10/2021) User will be able to logout
     -  List of Evidence of Feature Completion
       - Status:Completed
       - Direct Link: https://aa2789-prod.herokuapp.com/Project/logout.php
       - Pull Requests
         - https://github.com/aa2789/IT202-009/pull/7/files
         - https://github.com/aa2789/IT202-009/pull/25 (to see message that they've succesfully logged out)
       - Screenshots
         - ![image](https://user-images.githubusercontent.com/71272971/140596177-daf48a18-0e74-4828-8d99-dc9b0c88d124.png)
           - User will be redirected to login page after logging out as a result of using the header() function and session is destroyed using the reset_session() function.
         - ![image](https://user-images.githubusercontent.com/71272971/140967419-13af61a4-048b-4a10-b321-f6d36b0445c6.png)
           - User should see a message that they’ve successfully logged out
         - ![image](https://user-images.githubusercontent.com/71272971/140967627-e0cacabd-b47f-4fa5-937c-90705892b39c.png)
           - Session should be destroyed 
  - [x] (10/25/2021) Basic security rules implemented
     -  List of Evidence of Feature Completion
       - Status: Completed
       - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
       - Pull Requests
         - https://github.com/aa2789/IT202-009/pull/21
       - Screenshots
         - ![image](https://user-images.githubusercontent.com/71272971/140655286-d1978c10-1a46-466f-be27-b9950c758057.png)
           - Function to check if user is logged in
   - [x] (10/26/2021) Basic Roles implemented
     -  List of Evidence of Feature Completion
       - Status: Completeted
       - Direct Link: https://aa2789-prod.herokuapp.com/Project/admin/list_roles.php
       - Pull Requests
         - https://github.com/aa2789/IT202-009/pull/22
       - Screenshots
         - ![image](https://user-images.githubusercontent.com/71272971/140593446-87292bb3-2de6-41f4-a5ee-d3c5eb2fa1c6.png)
            - Have a Roles Table
         - ![image](https://user-images.githubusercontent.com/71272971/140593475-db01ef5e-70aa-4c42-9fcf-4551ac2cb812.png)
            - Have a User Roles Table
         - ![image](https://user-images.githubusercontent.com/71272971/140593523-acdef55e-125d-472c-a906-44e30a3bcb62.png)
            - Include a function to check if a user has a specific role
         
                 
  - [x] (11/10/2021) Site should have basic styles/theme applied; everything should be styled
     -  List of Evidence of Feature Completion
       - Status: Completed
       - Direct Link: https://aa2789-prod.herokuapp.com/Project/styles.css
       - Pull Requests
         - https://github.com/aa2789/IT202-009/pull/25
       - Screenshots
         - ![image](https://user-images.githubusercontent.com/71272971/140658492-b52e129c-4c27-42c2-9c76-358379b050ee.png)
           - Basic styles/themes were applied on the input of the forms, the navigation bar, body of the site, etc. 
  - [x] (10/11/2021) Any output messages/errors should be “user friendly”
     -  List of Evidence of Feature Completion
       - Status: Completed
       - Direct Link: https://aa2789-prod.herokuapp.com/Project/
       - Pull Requests
         - https://github.com/aa2789/IT202-009/pull/10
       - Screenshots
         - ![image](https://user-images.githubusercontent.com/71272971/141194181-b8b36f54-a726-477e-bd96-38065bd8ff4f.png)
           - Outputs message if username is not given
         - ![image](https://user-images.githubusercontent.com/71272971/141194383-8bf3f53f-c0ae-45f3-8faf-1def4bf3fbf8.png)
           - Outputs message if username is not given in assignroles.php
         - ![image](https://user-images.githubusercontent.com/71272971/141195138-f3d911d6-4f6f-4a97-aa89-122bf26e4de5.png)
           - Outputs message if invalid username is given in registration.
  - [x] (10/25/2021) User will be able to see their profile
     -  List of Evidence of Feature Completion
       - Status: Completed
       - Direct Link: https://aa2789-prod.herokuapp.com/Project/profile.php
       - Pull Requests
         - https://github.com/aa2789/IT202-009/pull/21
       - Screenshots
         - ![image](https://user-images.githubusercontent.com/71272971/140597356-3dba7bcc-3660-4c47-bd1d-54aac1abfbdc.png)
           - User can see profile
  - [x] (10/25/2021) User will be able to edit their profile
     -  List of Evidence of Feature Completion
       - Status: Completed
       - Direct Link: https://aa2789-prod.herokuapp.com/Project/profile.php
       - Pull Requests
         - https://github.com/aa2789/IT202-009/pull/21
       - Screenshots
         - ![image](https://user-images.githubusercontent.com/71272971/140656114-65d7c188-4298-47f8-8c8c-f91589ecfea8.png)
           - Changing username/email should properly check to see if it’s available before allowing the change
         - ![image](https://user-images.githubusercontent.com/71272971/140656254-788825f7-b064-4ca6-b56f-2dfb9c5530db.png)
           - Other fields should be properly validated
         - ![image](https://user-images.githubusercontent.com/71272971/140656276-f6896a0c-c490-4e9c-9348-97c99c46744d.png)
           - Allow password reset
                               
- Milestone 2
  - [x] (11/14/2021) User with an admin role or shop owner role will be able to add products to inventory
    -  List of Evidence of Feature Completion
      - Status: Completed
      - Direct Link: https://aa2789-prod.herokuapp.com/Project/admin/add_items.php
      - Pull Requests
        - https://github.com/aa2789/IT202-009/pull/30
      - Screenshots
        - ![image](https://user-images.githubusercontent.com/71272971/143536528-7eb8a3be-5287-4d2f-b91d-322b6f7084b9.png)
          - user with an admin or shop owner role can add products to inventory.  
        - ![image](https://user-images.githubusercontent.com/71272971/143536688-d47e8146-e03e-4c7e-98da-645594299df7.png)
          - Table should be called Products (id, name, description, category, stock, created, modified, unit_price, visibility [true, false])       
  - [x] (11/16/2021) Any user will be able to see products with visibility = true on the Shop page
    -  List of Evidence of Feature Completion
      - Status: Completed
      - Direct Link: https://aa2789-prod.herokuapp.com/Project/shop.php
      - Pull Requests
        - https://github.com/aa2789/IT202-009/pull/42
      - Screenshots
        - ![image](https://user-images.githubusercontent.com/71272971/143535472-10140e64-7980-4946-9902-89b2ca73a8ae.png)
          - User will be able to see the shop page without login and it lists the ten most recent items 
        - ![image](https://user-images.githubusercontent.com/71272971/143535611-27c52c4b-06b5-4d86-ae52-35868b11c186.png)
          - User will be able to filter results by category(Category used in picture was Technology)
        - ![image](https://user-images.githubusercontent.com/71272971/143535934-4cc845f8-a15a-4b7e-898c-300e7410c51c.png)
          - Code shows that user will be able to filter results by partial matches on name
        - ![image](https://user-images.githubusercontent.com/71272971/143536237-b593d489-fe09-4fb7-9ac5-989e262402a4.png)
          - Code shows that user can sort results by price.                                     
  - [x] (11/16/2021) Admin/Shop owner will be able to see products with any visibility
    -  List of Evidence of Feature Completion
      - Status: Completed
      - Direct Link:https://aa2789-prod.herokuapp.com/Project/admin/list_items.php
      - Pull Requests
        - https://github.com/aa2789/IT202-009/pull/43
      - Screenshots
        - ![image](https://user-images.githubusercontent.com/71272971/143532704-10c01798-9a1b-4f0a-97fe-7950cfab6344.png)
          - Admin/Shop owner will be able to see products with any visibility   
        - ![image](https://user-images.githubusercontent.com/71272971/143532846-ad16c6bb-c6c0-40ec-b9ba-76aa3ad1f89d.png)
          - image of database proving admins/shop owners can see all items despite the visibility.(basketball is set to visibility false)
        - ![image](https://user-images.githubusercontent.com/71272971/143533236-e481a9bb-9632-4046-ad4c-f022f60d8e16.png)
          - This page should only be accessible to the appropriate role(s)         
                           
  - [x] (11/18/2021) Admin/Shop owner will be able to edit any product
    -  List of Evidence of Feature Completion
      - Status: Pending (Completed)
      - Direct Link: https://aa2789-prod.herokuapp.com/Project/admin/edit_items.php?id=5
      - Pull Requests
        - https://github.com/aa2789/IT202-009/pull/44
      - Screenshots
        - ![image](https://user-images.githubusercontent.com/71272971/143531927-2a6917a8-a1a5-406e-b829-87ae04664287.png)
          - Image of database before update    
        - ![image](https://user-images.githubusercontent.com/71272971/143532000-f12d34f0-9718-489f-8e3f-5739044bbeef.png)
          - update stock for basketball   
        - ![image](https://user-images.githubusercontent.com/71272971/143532073-1472cfa3-d6cf-46e0-8e4c-a19602f86435.png)
          - After update
        - ![image](https://user-images.githubusercontent.com/71272971/143532132-128e1472-2dc9-4337-9695-90a3c1b1cf9a.png)
          - Edit button shown in product list for admins.
       
                                               
  - [x] (11/19/2021) User will be able to click an item from a list and view a full page with more info about the item (Product Details Page)
    -  List of Evidence of Feature Completion
      - Status:Completed
      - Direct Link: https://aa2789-prod.herokuapp.com/Project/details.php?id=5
      - Pull Requests
        - https://github.com/aa2789/IT202-009/pull/50
      - Screenshots
        - ![image](https://user-images.githubusercontent.com/71272971/143527655-725d82ca-7536-45f0-ab1b-7b2be347554c.png)
          - User can click an item from the product list
        - ![image](https://user-images.githubusercontent.com/71272971/143528785-668fdaf2-660e-4b50-901b-54a5a29c3018.png)
          - user can view a full page with more info about the item
  - [x] (11/20/2021) User must be logged in for any Cart related activity below
    -  List of Evidence of Feature Completion
      - Status: Completed
      - Direct Link: https://aa2789-prod.herokuapp.com/Project/cart.php
      - Pull Requests
        - https://github.com/aa2789/IT202-009/pull/51
      - Screenshots
        -![image](https://user-images.githubusercontent.com/71272971/143527130-b8dbac8d-64f7-42aa-9011-88cfbc00590d.png)
          - User can't add to cart unless logged in
        -![image](https://user-images.githubusercontent.com/71272971/143527258-ffb838e8-d241-4fad-9fc1-306a5366a088.png)
          - cart.php doesn't appear in nav bar unless a user is logged into their account. 
  - [x] (11/20/2021 of completion) User will be able to add items to Cart
    -  List of Evidence of Feature Completion
      - Status: Completed
      - Direct Link: https://aa2789-prod.herokuapp.com/Project/cart.php
      - Pull Requests
        - https://github.com/aa2789/IT202-009/pull/51
      - Screenshots
        - ![image](https://user-images.githubusercontent.com/71272971/143525668-2494f9bb-ac67-4f6e-b3de-6e50db9ef7fe.png)
          - user will be able to add items to thir cart. 
        - ![image](https://user-images.githubusercontent.com/71272971/143525786-907a1636-dc72-49e6-bd8d-f133b9ca388d.png)
          - Cart will be table-based (id, product_id, user_id, desired_quantity, unit_cost, created, modified)      
        - ![image](https://user-images.githubusercontent.com/71272971/143526066-a42cf540-255f-4fef-91dc-60b8eda38059.png)
          - Code shows that adding items to the cart doesn't change the quantity of the product. 
                            
  - [x] (11/20/2021) User will be able to see their cart
    -  List of Evidence of Feature Completion
      - Status: Completed
      - Direct Link: https://aa2789-prod.herokuapp.com/Project/cart.php
      - Pull Requests
        - https://github.com/aa2789/IT202-009/pull/52
      - Screenshots
        - ![image](https://user-images.githubusercontent.com/71272971/143523379-fb190493-aebf-4bd5-9aee-f959252e2a3f.png)
          - Shows that the user can see all items, shows subtotal for each item, shows total cart value, and the product names are clickable links which redirect to details.php
  - [x] (11/24/2021) User will be able to change quantity of items in their cart
    -  List of Evidence of Feature Completion
      - Status: Completed
      - Direct Link: https://aa2789-prod.herokuapp.com/Project/cart.php
      - Pull Requests
        - https://github.com/aa2789/IT202-009/pull/53
      - Screenshots
        - ![image](https://user-images.githubusercontent.com/71272971/143262233-6f20aa4b-738a-4b52-9081-9b642512fdcf.png)
          - There are initially three ipads
        - ![image](https://user-images.githubusercontent.com/71272971/143262518-2faa531f-cb6f-4818-b492-2bbdacf97c99.png)
          - picture of cart database
        - ![image](https://user-images.githubusercontent.com/71272971/143262685-f0850a6d-e964-4b48-8ac7-64ccadc07f45.png)
          - After update there are two
        - ![image](https://user-images.githubusercontent.com/71272971/143262734-bc30960a-1a5b-4b2b-8d97-2d799c7a1c53.png)
          - Picture of database
         - ![image](https://user-images.githubusercontent.com/71272971/143263392-a391595e-c6f0-4dc6-8d35-1df988ebfddb.png)
          - Code shows that if a user updates one of their items to a quantity of zero, then it removes the item.                                     
  - [x] (11/24/21) User will be able to remove a single item from their cart vai button click
    -  List of Evidence of Feature Completion
      - Status: Completed
      - Direct Link: https://aa2789-prod.herokuapp.com/Project/cart.php
      - Pull Requests
        - https://github.com/aa2789/IT202-009/pull/53
      - Screenshots
        - ![image](https://user-images.githubusercontent.com/71272971/143267441-f2553419-b7a3-4085-8f85-6d723a38970a.png)
          - Before deletion
        - ![image](https://user-images.githubusercontent.com/71272971/143267637-bea92bea-0cbe-4793-9ab7-111580777383.png)
          - After clicking button to remove the mini fridge
        - ![image](https://user-images.githubusercontent.com/71272971/143264502-453623ab-1973-45f3-8ab8-117e04acb5b4.png)
          - Code shows that product id is passed to removeFromCart.php after clicking the remove from cart button. 
        - ![image](https://user-images.githubusercontent.com/71272971/143264627-d17422f5-5541-40c7-bbad-94d2439e634a.png)
          - removeFromCart.php code                  
  - [x] (11/24/21) User will be able to clear their entire cart via a button click
    -  List of Evidence of Feature Completion
      - Status: Completed
      - Direct Link: https://aa2789-prod.herokuapp.com/Project/cart.php
      - Pull Requests
        - https://github.com/aa2789/IT202-009/pull/53
      - Screenshots
        - ![image](https://user-images.githubusercontent.com/71272971/143267920-1a36bec4-7bfb-4172-8fe5-0041a8956540.png)
          - Before clearing all
        - ![image](https://user-images.githubusercontent.com/71272971/143268045-20e901a2-11ec-488c-b469-2000145f5eed.png)
          - After clicking the remove all button 
        - ![image](https://user-images.githubusercontent.com/71272971/143268210-a95bd1c5-5c60-4569-8e59-b7376b1e2895.png)
          - All items for user with id 12 removed from the cart database.
        - ![image](https://user-images.githubusercontent.com/71272971/143264939-c6422fc1-108b-4266-bfda-9ea1c87dff7f.png)
          - Passes "all" to removeFromCart.php
        - ![image](https://user-images.githubusercontent.com/71272971/143265810-1ec4bfe9-8647-424b-9f38-e2598a8d24ed.png)
          - removeFromCart.php code
- Milestone 3
- Milestone 4
### Intructions
#### Don't delete this
1. Pick one project type
2. Create a proposal.md file in the root of your project directory of your GitHub repository
3. Copy the contents of the Google Doc into this readme file
4. Convert the list items to markdown checkboxes (apply any other markdown for organizational purposes)
5. Create a new Project Board on GitHub
   - Choose the Automated Kanban Board Template
   - For each major line item (or sub line item if applicable) create a GitHub issue
   - The title should be the line item text
   - The first comment should be the acceptance criteria (i.e., what you need to accomplish for it to be "complete")
   - Leave these in "to do" status until you start working on them
   - Assign each issue to your Project Board (the right-side panel)
   - Assign each issue to yourself (the right-side panel)
6. As you work
  1. As you work on features, create separate branches for the code in the style of Feature-ShortDescription (using the Milestone branch as the source)
  2. Add, commit, push the related file changes to this branch
  3. Add evidence to the PR (Feat to Milestone) conversation view comments showing the feature being implemented
     - Screenshot(s) of the site view (make sure they clearly show the feature)
     - Screenshot of the database data if applicable
     - Describe each screenshot to specify exactly what's being shown
     - A code snippet screenshot or reference via GitHub markdown may be used as an alternative for evidence that can't be captured on the screen
  4. Update the checklist of the proposal.md file for each feature this is completing (ideally should be 1 branch/pull request per feature, but some cases may have multiple)
    - Basically add an x to the checkbox markdown along with a date after
      - (i.e.,   - [x] (mm/dd/yy) ....) See Template above
    - Add the pull request link as a new indented line for each line item being completed
    - Attach any related issue items on the right-side panel
  5. Merge the Feature Branch into your Milestone branch (this should close the pull request and the attached issues)
    - Merge the Milestone branch into dev, then dev into prod as needed
    - Last two steps are mostly for getting it to prod for delivery of the assignment 
  7. If the attached issues don't close wait until the next step
  8. Merge the updated dev branch into your production branch via a pull request
  9. Close any related issues that didn't auto close
    - You can edit the dropdown on the issue or drag/drop it to the proper column on the project boar
