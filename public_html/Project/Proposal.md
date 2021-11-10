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
         - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
           - Screenshot #1 description explaining what you're trying to show
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
