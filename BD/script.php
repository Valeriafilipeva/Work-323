<?php
// Подключение к базе данных
$pdo = new PDO('pgsql:host=localhost;dbname=Monitoring_System', 'new_user', 'admin');

// Получение данных из POST-запроса
$name = $_POST['name'];
$table = $_POST['table']; // Добавляем выбор таблицы

// Подготовка SQL-запроса
if ($table === 'departments') {
    $stmt = $pdo->prepare("INSERT INTO departments (name) VALUES (:name)");
} elseif ($table === 'employees') {
    $stmt = $pdo->prepare("INSERT INTO employees (name, position) VALUES (:name, :position)");
} else {
    echo json_encode(['status' => 'error', 'message' => 'Неизвестная таблица']);
    exit();
}

// Привязка параметров и выполнение запроса
$stmt->bindParam(':name', $name);
if ($table === 'employees') {
    $position = $_POST['position']; // Предполагаем, что позиция передается через POST
    $stmt->bindParam(':position', $position);
}
$stmt->execute();

echo json_encode(['status' => 'success']);
?>

/*
CREATE TABLE IF NOT EXISTS public.departments
(
    id serial NOT NULL,
    name character varying(255) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT departments_pkey PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS public.employees
(
    id serial NOT NULL,
    name character varying(255) COLLATE pg_catalog."default" NOT NULL,
    "position" character varying(255) COLLATE pg_catalog."default",
    department_id integer,
    CONSTRAINT employees_pkey PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS public.employees_project
(
    id integer NOT NULL,
    employees_id integer NOT NULL,
    project_id integer NOT NULL,
    CONSTRAINT employees_project_pkey PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS public.locations
(
    id serial NOT NULL,
    department_id integer,
    address character varying(255) COLLATE pg_catalog."default" NOT NULL,
    capacity integer NOT NULL,
    CONSTRAINT locations_pkey PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS public.projects
(
    id serial NOT NULL,
    name character varying(255) COLLATE pg_catalog."default" NOT NULL,
    description text COLLATE pg_catalog."default",
    start_date date,
    end_date date,
    CONSTRAINT projects_pkey PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS public.tasks
(
    id serial NOT NULL,
    project_id integer,
    title character varying(255) COLLATE pg_catalog."default" NOT NULL,
    description text COLLATE pg_catalog."default",
    status character varying(50) COLLATE pg_catalog."default",
    employees_id integer,
    estimated_time numeric(5, 2) NOT NULL DEFAULT 8,
    CONSTRAINT tasks_pkey PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS public.timelogs
(
    id serial NOT NULL,
    employee_id integer,
    task_id integer,
    hours_worked numeric(5, 2) NOT NULL,
    worked_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT timelogs_pkey PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS public."НОВАЯ"
(
    id integer NOT NULL,
    text character varying(100) COLLATE pg_catalog."default",
    CONSTRAINT "НОВАЯ_pkey" PRIMARY KEY (id)
);

ALTER TABLE IF EXISTS public.employees
    ADD CONSTRAINT employees_department_id_fkey FOREIGN KEY (department_id)
    REFERENCES public.departments (id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION;


ALTER TABLE IF EXISTS public.employees_project
    ADD CONSTRAINT employees_project_employees_id_fkey FOREIGN KEY (employees_id)
    REFERENCES public.employees (id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION;


ALTER TABLE IF EXISTS public.employees_project
    ADD CONSTRAINT employees_project_project_id_fkey FOREIGN KEY (project_id)
    REFERENCES public.projects (id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION;


ALTER TABLE IF EXISTS public.locations
    ADD CONSTRAINT locations_department_id_fkey FOREIGN KEY (department_id)
    REFERENCES public.departments (id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION;


ALTER TABLE IF EXISTS public.tasks
    ADD CONSTRAINT tasks_assigned_to_id_fkey FOREIGN KEY (employees_id)
    REFERENCES public.employees (id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION;


ALTER TABLE IF EXISTS public.tasks
    ADD CONSTRAINT tasks_project_id_fkey FOREIGN KEY (project_id)
    REFERENCES public.projects (id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION;


ALTER TABLE IF EXISTS public.timelogs
    ADD CONSTRAINT timelogs_employee_id_fkey FOREIGN KEY (employee_id)
    REFERENCES public.employees (id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION;


ALTER TABLE IF EXISTS public.timelogs
    ADD CONSTRAINT timelogs_task_id_fkey FOREIGN KEY (task_id)
    REFERENCES public.tasks (id) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION;
*/