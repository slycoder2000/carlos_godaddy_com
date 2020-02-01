<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="app.css" />

    <title>Vue.js • TodoMVC</title>
    <link rel="stylesheet" href="node_modules/todomvc-common/base.css">
    <link rel="stylesheet" href="node_modules/todomvc-app-css/index.css">
    <style>
    [v-cloak] {
        display: none;
    }
    </style>

    <style>
    #driver-nav {
        display: grid;
        grid-gap: 10px;
        padding: 0;
        list-style: none;
        grid-template-columns: repeat(4, 1fr);
    }



    @media screen and (max-width: 750px) {
        input {
            font-size: 4vw;
        }
    }
    </style>
</head>

<body>

    <!--Nav-->
    <div id="wrapper" class="small-container">

        <div id="driver-nav">
            <?php require_once('tabs.php'); ?>

        </div>
        <h1>Goals</h1>

        <section class="todoapp" v-cloak>
            <header class="header">

                <input class="new-todo" autofocus autocomplete="off" placeholder="What needs to be done?"
                    v-model="newTodo" @keyup.enter="addTodo">
            </header>
            <section class="main" v-show="todos.length">
                <input id="toggle-all" class="toggle-all" type="checkbox" v-model="allDone">
                <label for="toggle-all">Mark all as complete</label>
                <ul class="todo-list">
                    <li class="todo" v-for="todo in filteredTodos" :key="todo.id"
                        :class="{completed: todo.completed, editing: todo == editedTodo}">
                        <div class="view">
                            <input class="toggle" type="checkbox" v-model="todo.completed">
                            <label @dblclick="editTodo(todo)">{{todo.title}}</label>
                            <button class="destroy" @click="removeTodo(todo)"></button>
                        </div>
                        <input class="edit" type="text" v-model="todo.title" v-todo-focus="todo == editedTodo"
                            @blur="doneEdit(todo)" @keyup.enter="doneEdit(todo)" @keyup.esc="cancelEdit(todo)">
                    </li>
                </ul>
            </section>
            <div class="footer2" v-show="todos.length">
                <span class="todo-count">
                    <strong v-text="remaining"></strong> {{pluralize('item', remaining)}} left
                </span>
                <ul class="filters">
                    <li><a href="#/all" :class="{selected: visibility == 'all'}">All</a></li>
                    <li><a href="#/active" :class="{selected: visibility == 'active'}">Active</a></li>
                    <li><a href="#/completed" :class="{selected: visibility == 'completed'}">Completed</a></li>
                </ul>
                <button class="clear-completed" @click="removeCompleted" v-show="todos.length > remaining">
                    Clear completed
                </button>
            </div>
        </section>
        <div class="info">
            <p>Double-click to edit a todo</p>
            <p>Written by <a href="http://evanyou.me">Evan You</a></p>
            <p>Part of <a href="http://todomvc.com">TodoMVC</a></p>
        </div>
        <script src="node_modules/todomvc-common/base.js"></script>
        <script src="node_modules/director/build/director.js"></script>
        <script src="node_modules/vue/dist/vue.js"></script>
        <script src="js/store.js"></script>
        <script src="js/app.js"></script>
        <script src="js/routes.js"></script>



</body>

</html>