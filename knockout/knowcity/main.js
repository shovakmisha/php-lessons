(function () {

   // Constructor
   var Checklist = function() {

       var self = this;
       this.tasks = [];
       this.compleateTasks = [];

       this.addTask = function (taskTitle) {
            self.tasks.push({
                id: this.tasks.length,
                title: taskTitle
            });
       };

       this.removeTask = function (id) {

           var taskIndex = this.getIndexById(id, this.tasks);

           if(taskIndex) {
               this.tasks.splice(taskIndex, 1);
           }

           console.log( this.tasks, taskIndex);

       };

       this.checkTask = function (id) {
            var taskIndex = this.getIndexById(id, this.tasks),
                task;

            if(typeof taskIndex !== 'undefined') {
                task = this.tasks[taskIndex];
                this.tasks.splice(taskIndex, 1);
                this.compleateTasks.push(task);
            }
       };

       this.undoTask = function (id) {
           var taskIndex = this.getIndexById(id, this.compleateTasks),
               task;

           if(typeof taskIndex !== 'undefined') {
               task = this.compleateTasks[taskIndex];
               this.compleateTasks.splice(taskIndex, 1);
               this.tasks.push(task);
           }
       };

       this.getIndexById = function (id, tasks) {
         var index;

         for (var i = 0, max = tasks.length; i < max; i++ ) {
             if( tasks[i].id === id ) {
                 index = i;
                 break;
             }
         }

         return index;
       };

   };

   // екземпляр конструктора
    var glob = this;
    glob.checklist = new Checklist();


    // Вю модель
    var CheckListViewModel = function () {

        var self = this;
        this.checklist = glob.checklist;
        this.newTaskTitle = ko.observable('Цей текст буде у інпуті по дефолту');
        this.tasks = ko.observableArray(self.checklist.tasks);
        this.compleateTasks = ko.observableArray(self.checklist.compleateTasks);

        this.addTask = function () {
            self.checklist.addTask(this.newTaskTitle());
            this.newTaskTitle('');
            self.tasks(self.checklist.tasks);
        };

        //this.checkTask = function () {
        //    self.checklist.addTask(this.newTaskTitle());
        //    this.newTaskTitle('');
        //};

        this.removeTask = function (taskObject, event) {
            self.checklist.removeTask(taskObject.id);
            self.tasks(self.checklist.tasks);
        };

        this.checkTask = function (taskObject, event) {
            self.checklist.checkTask(taskObject.id);
            self.tasks(self.checklist.tasks);
            self.compleateTasks(self.checklist.compleateTasks);
        };

        this.undoTask = function (taskObject, event) {
            self.checklist.undoTask(taskObject.id);
            self.tasks(self.checklist.tasks);
            self.compleateTasks(self.checklist.compleateTasks);
        };


    };


    ko.applyBindings( new CheckListViewModel(), document.getElementById('todoList'));

})();
