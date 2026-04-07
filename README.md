![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)

# COMOND: Control Monetario Dual

## Objetivo: Organizar y llevar un control de gastos

* Enlistar los gastos individuales por persona, restando al sueldo base por cada gasto
* Calcular el total de gastos por cobro al mes
* Calcular el total de gastos por mes
* Exportar un pdf enlistado de los gastos del mes con montos y observaciones o anotaciones

## El programa debe cumplir/tener

* Establecer sueldo base de cobros( Se espera actualizar ) para ir restando a esa cantidad los gastos, productos o pagos
* Agregar gastos o productos con: Nombre, Tipo, Valor, Tasa y anotaciones
* Exportar PDF con el listado de gastos del mes, con montos y observaciones o anotaciones
* Poder alternar entre qué persona está haciendo su listado, y conservar el registro de las listas anteriores del mes, para poder comparar gastos entre personas o meses
* Poder eliminar gastos o productos de la lista, en caso de que se haya cometido un error

## Base de datos

### Modulo de seguridad

#### Tabla: usuario
- id_usuario int 11
- nom_usuario varchar 50
- user_usuario varchar 50
- pass_usuario varchar 255

### Modulo de gastos

#### Tabla: sueldo
- id_sueldo int 11
- id_usuario int 11
- nom_sueldo varchar 255
- valor_sueldo decimal 15,2
- tasa_sueldo decimal 15,2
- moneda_sueldo char 5
- tipo_sueldo varchar 255
- fecha_sueldo date

#### Tabla: gasto
- id_gasto int 11
- id_usuario int 11
- id_sueldo int 11
- nom_gasto varchar 255
- valor_gasto decimal 15,2
- tasa_gasto decimal 15,2
- moneda_gasto char 5
- tipo_gasto varchar 255
- nota_gasto text null

#### Tabla: adicional
- id_add int 11
- id_sueldo int 11
- id_usuario int 11
- nom_add varchar 50
- valor_add decimal 15,2
- tasa_adicional 15,2
- moneda_add char 5
- nota_add text null
- fecha_add date

#### Tabla: lista
- id_lista int 11
- id_usuario int 11
- nom_lista varchar 50
- nota_lista text null
- fecha_lista date