1. Run `npm i`
2. Run `npm i eslint webpack-dev-server webpack eslint-plugin-react -g`
3. Run `npm run dev`
4. Open `localhost:3000`
5. For backend run 'npm run prod' and use index.php
6. In database:
    1) create database url_shorturl;
    2) create table urls(
        id int not null primary key auto_increment,
        url varchar(255),
        code varchar(255),
        created datetime
       );

7. Visit `https://thought-out-tab.000webhostapp.com/index.php`
