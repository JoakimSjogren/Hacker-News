# Hacker-News

## Installion Instruction

# navigate to the resources folder in the repository
# Start a php localserver using: "php -S localhost:8000"
# Open browser and go to http://localhost:8000/


## Testers

1. Erik White
2. Joacim Johansson

### Feedback by [Réka Madarász](https://github.com/mreka91)

1. The page/database was empty. It would've been nice to see how the page looks like filled up with a couple of posts
2. You have almost everything in the views folder. Try to break it up
3. Maybe have a posts subfolder in the app folder for everything related to the posts, so it is easy to find them
4. Consider adding a favicon to your page
5. navigation.php: you have the closing body and html tags here
6. footer.php: maybe you could add a simple footer and have the closing body and html tags here
7. autoload.php: you started a session here,you don't need to start new sessions in every other file, just requiere it
8. login.php and submit.php: you could requiere the header.php file
9. navigation#39: it's not so intuitive to find the profil page when it is referred to by the user's email
10. profile.php: you could show the user's bio after it's been added to the database
11. It would be nice to see a confirmation when the user submits/edits posts or profile info
12. post.php#9: don't forget to sanitize the url, too
13. main.js#7: what is the purpose of logging aaa to the console
14. consider using alternative syntax for control structures and don't forget to end your if statements
15. css is easy to follow, nice that you broke them up in different files
16. it is easy to understand what the functions do by their name, but maybe consider commenting what are they for
