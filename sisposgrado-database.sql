CREATE DATABASE IF NOT EXISTS sisposgrado COLLATE utf8_unicode_ci;

USE sisposgrado;

CREATE TABLE IF NOT EXISTS usuarios(
    id                  int auto_increment not null,
    nombre              varchar(200) not null,
    apellidos           varchar(255) not null,
    email               varchar(255) not null unique,
    email_verified_at   datetime,
    password            varchar(255) not null,
    genero              varchar(100) null,
    direccion           varchar(255) null,
    telefono            varchar(50) null,
    tipo_usuario        enum('Administrador', 'Docente', 'Estudiante', 'Jefe Posgrado', 
                             'Coordinador', 'Asistente Coordinador', 'Secretaria') not null,
    created_at          datetime,
    updated_at          datetime,
    remember_token      varchar(255),

    CONSTRAINT pk_usuarios PRIMARY KEY(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS lineas_investigacion(
    id              int auto_increment not null,
    nombre          varchar(255) not null,
    descripcion     text,
    created_at      datetime,
    updated_at      datetime,

    CONSTRAINT pk_lineas_investigacion PRIMARY KEY(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS docentes(
    id                      int auto_increment not null,
    id_usuario              int not null,
    sni                     enum('S','N') null default 'N',
    catedras                enum('S','N') null default 'N',
    tipo_investigador       varchar(255) null default 'Investigador',
    nivel_academico         varchar(255) null default 'Licenciatura',
    puesto                  varchar(255) null default 'Docente',
    jornada                 varchar(255) null default 'Jornada completa',
    publicaciones           json null,
    cursos                  json null,
    created_at              datetime,
    updated_at              datetime,

    CONSTRAINT pk_docentes PRIMARY KEY(id),
    CONSTRAINT fk_docentes_usuarios FOREIGN KEY(id_usuario) REFERENCES usuarios(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS programas(
    id                          int auto_increment not null,
    nombre                      varchar(255) not null,
    impacto                     text,
    part_grupos_proyectos       json null,
    servicios_prestados         json null,
    datos_relevantes            json null,
    orientacion                 enum('S','N') not null,
    justificacion_orientacion   text null,
    created_at                  datetime,
    updated_at                  datetime,

    CONSTRAINT pk_programas PRIMARY KEY(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS estudiantes(
    id              int auto_increment not null,
    id_usuario      int not null,
    numero_control  varchar(50) null,
    programa        varchar(255) null,
    generacion      varchar(255) null,
    nivel_estudios  varchar(255),
    ruta_articulo   text null,
    becario         enum('S','N') null default 'N',
    cvu             varchar(255) null,
    created_at      datetime,
    updated_at      datetime,

    CONSTRAINT pk_estudiantes PRIMARY KEY(id),
    CONSTRAINT fk_estudiantes_usuarios FOREIGN KEY(id_usuario) REFERENCES usuarios(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS docentes_estudiantes(
    id              int auto_increment not null,
    id_docente      int not null,
    id_estudiante   int not null,
    created_at      datetime,
    updated_at      datetime,

    CONSTRAINT pk_docentes_estudiantes PRIMARY KEY(id),
    CONSTRAINT fk_docentes_docentes FOREIGN KEY(id_docente) REFERENCES docentes(id),
    CONSTRAINT fk_docentes_estudiantes FOREIGN KEY(id_estudiante) REFERENCES estudiantes(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS lineas_docentes(
    id                      int auto_increment not null,
    id_linea_investigacion  int not null,
    id_docente              int not null,
    created_at      datetime,
    updated_at      datetime,

    CONSTRAINT pk_lineas_docentes PRIMARY KEY(id),
    CONSTRAINT fk_linea_lineas FOREIGN KEY(id_linea_investigacion) REFERENCES lineas_investigacion(id),
    CONSTRAINT fk_linea_docentes FOREIGN KEY(id_docente) REFERENCES docentes(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS lineas_programas(
    id                      int auto_increment not null,
    id_linea_investigacion  int not null,
    id_programa             int not null,
    created_at      datetime,
    updated_at      datetime,

    CONSTRAINT pk_lineas_programas PRIMARY KEY(id),
    CONSTRAINT fk_linea_linea_investigacion FOREIGN KEY(id_linea_investigacion) REFERENCES lineas_investigacion(id),
    CONSTRAINT fk_linea_programa FOREIGN KEY(id_programa) REFERENCES programas(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS tesis(
    id                      int auto_increment not null,
    id_estudiante           int not null,
    titulo                  varchar(255) not null,
    director                int null,
    director_externo        text null,
    codirector              int null,
    secretario              int null,
    vocal                   int null,
    ruta_tesis              text,

    CONSTRAINT pk_tesis PRIMARY KEY(id),
    CONSTRAINT fk_tesis_estudiante FOREIGN KEY(id_estudiante) REFERENCES estudiantes(id),
    CONSTRAINT fk_tesis_director FOREIGN KEY(director) REFERENCES usuarios(id),
    CONSTRAINT fk_tesis_codirector FOREIGN KEY(codirector) REFERENCES usuarios(id),
    CONSTRAINT fk_tesis_secretario FOREIGN KEY(secretario) REFERENCES usuarios(id),
    CONSTRAINT fk_tesis_vocal FOREIGN KEY(vocal) REFERENCES usuarios(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS infraestructura_servicios(
    id                  int auto_increment not null,
    nombre              varchar(255) not null,
    tipo                varchar(255) null default 'tipo 1',
    caracteristicas     text null,
    observaciones       text null,
    created_at          datetime,
    updated_at          datetime,

    CONSTRAINT pk_infraestructura_servicios PRIMARY KEY(id)
)ENGINE=InnoDB;
