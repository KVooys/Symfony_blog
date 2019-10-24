## Symfony blog

Q: Another blog repo? 

A: Yes. 

I'm once again learning a web framework by building a blog.
This time I'm learning PHP Symfony! And just brushing up on LAMP skills in general.

Why a blog? Well, a blog allows you to build a lot of features that are basically requirements for any website:
- A user register/login feature
- A clean, simple interface (a list of posts, and a way to view a single post)
- Content that you'd want to be easy to make, edit and delete! (the posts)
- Lots of potential for extensions; a custom editor, archives, full text search, tags, user comments

### Requirements
- A machine with PHP 7.x and Composer on it
- A database of pretty much any kind (Currently using MySQL)

An easy way to get started with this is to use [Vagrant](https://www.vagrantup.com) and the prebuilt PHP development VM [Homestead](https://github.com/laravel/homestead).
It comes with pretty much everything you'll need, including webservers, mailservers and multiple database management systems (using MySQL by default).

### Schema

The default setup uses just two tables: user and blog_post, like so:

```bash
mysql> describe user;
+----------+--------------+------+-----+---------+----------------+
| Field    | Type         | Null | Key | Default | Extra          |
+----------+--------------+------+-----+---------+----------------+
| id       | int(11)      | NO   | PRI | NULL    | auto_increment |
| username | varchar(180) | NO   | UNI | NULL    |                |
| roles    | json         | NO   |     | NULL    |                |
| password | varchar(255) | NO   |     | NULL    |                |
+----------+--------------+------+-----+---------+----------------+

mysql> describe blog_post;
+-------------+---------------+------+-----+---------+----------------+
| Field       | Type          | Null | Key | Default | Extra          |
+-------------+---------------+------+-----+---------+----------------+
| id          | int(11)       | NO   | PRI | NULL    | auto_increment |
| user_id     | int(11)       | YES  | MUL | NULL    |                |
| title       | varchar(255)  | NO   |     | NULL    |                |
| slug        | varchar(255)  | NO   | UNI | NULL    |                |
| body        | longtext      | NO   |     | NULL    |                |
| created_at  | datetime      | NO   |     | NULL    |                |
| updated_at  | datetime      | NO   |     | NULL    |                |
+-------------+---------------+------+-----+---------+----------------+
```

### TODO
- [x] Build feature for viewing post list @ /posts
- [ ] Finish up user register/login feature
- [ ] Build feature for viewing single posts
- [ ] Maybe some CSS to make things not look terrible
- [ ] Integrate third party login, for fun. Using https://github.com/hwi/HWIOAuthBundle
- [ ] Custom editor support, for fun

Q: After making a blog in 3 different frameworks, will you actually write a blog?

A: Probably not, but either way, it would inevitably be a blog about making blogs.
