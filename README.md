
# COMOND: Control Monetario Dual

## Objetivo: Organizar y llevar un control de gastos

* Enlistar los gastos individuales por persona, restando al sueldo base por cada gasto
* Calcular el total de gastos por cobro al mes
* Calcular el total de gastos por mes
* Exportar un pdf enlistado de los gastos del mes con montos y observaciones o anotaciones

## El programa debe cumplir/tener

* Establecer sueldo base de cobros (Corresponsabilidad, Guerra) por los momentos - Se espera actualizar - para ir restando a esa cantidad los gastos, productos o pagos
* Agregar gastos o productos con: Nombre, Tipo, Valor, Tasa y anotaciones
* Exportar PDF con el listado de gastos del mes, con montos y observaciones o anotaciones
* Poder alternar entre qué persona está haciendo su listado, y conservar el registro de las listas anteriores del mes, para poder comparar gastos entre personas o meses
* Poder eliminar gastos o productos de la lista, en caso de que se haya cometido un error

## Base de datos

### Modulo de seguridad

#### Tabla: usuario
- id_usuario
- nom_usuario
- user_usuario
- pass_usuario

### Modulo de gastos

#### Tabla: sueldo
- id_sueldo
- id_usuario
- tipo_sueldo
- valor_sueldo
- fecha_sueldo

#### Tabla: gasto
- id_gasto
- id_usuario
- id_sueldo
- nom_gasto
- valor_gasto
- tasa_gasto
- tipo_gasto
- nota_gasto

#### Tabla: adicional *(add)*
- id_add
- id_sueldo
- nom_add
- valor_add *null*
- nota_add
- fecha_add

#### Tabla: lista
- id_lista
- nom_lista
- fecha_lista