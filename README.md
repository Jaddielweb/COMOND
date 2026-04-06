
# COMOND: Control Monetario Dual

# Objetivo: Organizar y llevar un control de gastos

* Enlistar los gastos individuales por persona, restando al sueldo base por cada gasto
* Calcular el total de gastos por cobro al mes
* Calcular el total de gastos por mes
* Exportar un pdf enlistado de los gastos del mes con montos y observaciones o anotaciones

# El programa debe cumplir/tener

* Establecer sueldo base de cobros (Corresponsabilidad, Guerra) por los momentos - Se espera actualizar - para ir restando a esa cantidad los gastos, productos o pagos
* Agregar gastos o productos con: Nombre, Tipo, Valor, Tasa, Caracteristica, Observación
* Exportar PDF con el listado de gastos del mes, con montos y observaciones o anotaciones
* Poder alternar entre qué persona está haciendo su listado, y conservar el registro de las listas anteriores del mes, para poder comparar gastos entre personas o meses
* Poder eliminar gastos o productos de la lista, en caso de que se haya cometido un error

COMOND/
├── config/             # Conexión a DB y constantes globales
├── public/             # Único punto de acceso (Assets: CSS, JS, Imágenes)
│   ├── assets/
│   │   ├── bootstrap/
│   │   │   ├── css/
│   │   │   └── js/
│   │   ├── css/
│   │   ├── img/
│   │   └── js/
│   └── index.php       # Tu Front Controller (punto de entrada)
├── src/                # Lógica del negocio (PHP puro)
│   ├── controllers/    # Intermediarios entre Vista y Modelo
│   ├── models/         # Comunicación con la Base de Datos
│   ├── views/          # Archivos .php con el HTML/Frontend
│   └── services/       # Lógica compleja (ej. Generador de PDF)
├── vendor/             # Librerías externas (instaladas con Composer)
├── .htaccess           # Configuración de servidor para URLs amigables
├── README.md           # Tu archivo info.md renombrado
└── composer.json       # Gestión de dependencias