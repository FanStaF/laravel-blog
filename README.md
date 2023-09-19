## About Laravel-blog

Following allong as Jeffrey Way teaches Laravel 8 from Scratch. Completed all 70 
episodes and commited after each section, starting from section 5. Also completed the
7 extra tasks suggested at the end of the course.

### Further Ideas
Of course we only had time in the Laravel From Scratch series to review the essentials of a blogging platform. You can certainly take this many steps further. Here are some quick ideas that you might play with.

1. Add a status column to the posts table to allow for posts that are still in a "draft" state. Only when this status is changed to "published" should they show up in the blog feed.
    - Added a published_at column and used that timestamp to determin the state of the post:
        - Any date in the past and the post is published.
        - any future date and the post is scheduled for posting (can't set specific data auto sets to one week from now)
        - a null menas the post is an unpublished draft
2. Update the "Edit Post" page in the admin section to allow for changing the author of a post.
    - Done
3. Add an RSS feed that lists all posts in chronological order.
    - Done
4. Record/Track and display the "views_count" for each post.
    - Done
5. Allow registered users to "follow" certain authors. When they publish a new post, an email should be delivered to all followers.
    - Users can now follow/unfollow authors and view posts from followed authors on their 'My Feed'-page.
    - Email is sent to all followers of the post author when a new post is posted
    - TODO handel scheduled posts. Email is always and only send when a new post is created.
6. Allow registered users to "bookmark" certain posts that they enjoyed. Then display their bookmarks in a corresponding settings page.
    - Added bookmarks
7. Add an account page to update your username and upload an avatar for your profile.
    - Done!
