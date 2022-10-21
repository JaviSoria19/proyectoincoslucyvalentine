<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contacto extends CI_Controller {

    public function inicio()
    {
        $data['cb_institucion'] = array(
            'Servicios Legales Integrales Municipales - SLIM Jefatura',
            'Servicios Legales Integrales Municipales - SLIM Sub Alcaldía Tunari PACATA',
            'Servicios Legales Integrales Municipales - SLIM Sub Alcaldía Adela Zamudio',
            'Servicios Legales Integrales Municipales - SLIM Sub Alcaldía Tunari EPI NORTE',
            'Servicios Legales Integrales Municipales - SLIM Sub Alcaldía Alejo Calatayud',
            'Servicios Legales Integrales Municipales - SLIM Sub Alcaldía Molle',
            'Servicios Legales Integrales Municipales - SLIM Sub Alcaldía Villa México',
            'Servicios Legales Integrales Municipales - SLIM Sub Alcaldía Valle Hermoso D6');
        $data['cb_telefono'] = array(
            '4321178',
            '4010883',
            '4010884',
            '4476773',
            '4225890',
            '4225890',
            '4235243',
            '4010880');
        $data['cb_direccion'] = array(
            'C. San Martín 448',
            'Av. Circunvalación casi Servicio de Caminos',
            'Colombia esquina Ayacucho',
            'Melchor Pérez y Circunvalación',
            'Petrolera Km 2 1/2',
            'Acre entre Beijing y Villavicencio',
            'Av. México, detrás del Mercado',
            'Complejo Petrolero, Calle Pojo');

        $data['lp1_institucion'] = array('Sartasin Warmi');
        $data['lp1_telefono'] = array('2850076');
        $data['lp1_direccion'] = array('Av. Guadalquivir #2015');

        $data['lp2_institucion'] = array(
            'SLIM CENTRO',
            'SLIM Periférica',
            'SLIM Sur y Mallasa',
            'SLIM Cotahuma',
            'SLIM Max Paredes',
            'SLIM San Antonio Zongo-Hampaturi');
        $data['lp2_telefono'] = array(
            '76739563',
            '69878205',
            '69979868',
            '69868184',
            '69950421',
            '69973989');
        $data['lp2_direccion'] = array(
            'Zona El Rosario, pasaje Melchor Jimenez esq. Graneros, interior ex centro municipal Juancito Pinto',
            'Av. Prolongación Manco Kapac, frente al garaje del teleférico rojo',
            'Calle 16 de Obrajes entre Av. Costanera y del Policia, frente a la rotonda de Següencoma',
            'Av Entre Rios esq. Chorolque interior del Centro Integrado de Justicia Max Paredes, subsuelo, detrás del Cementerio General',
            'Av. Entre Rios esq. Chorolque',
            'Av. Josefa Mujía, Alto San Antonio, interior de la Sub Alcaldía San Antonio');

        $data['sc_institucion'] = array(
            'Unidad de Víctimas Especiales (UVE)',
            'Servicios Legales Integrales Municipales (SLIM) - Distrito 1: Sub Alcaldía',
            'Servicios Legales Integrales Municipales (SLIM) - Distrito 2: Sub Alcaldía',
            'Servicios Legales Integrales Municipales (SLIM) - Distrito 3: Sub Alcaldía',
            'Servicios Legales Integrales Municipales (SLIM) - Distrito 4: Sub Alcaldía',
            'Servicios Legales Integrales Municipales (SLIM) - Distrito 5: Sub Alcaldía',
            'Servicios Legales Integrales Municipales (SLIM) - Distrito 7: Sub Alcaldía',
            'Servicios Legales Integrales Municipales (SLIM) - Distrito 8: Sub Alcaldía',
            'Servicios Legales Integrales Municipales (SLIM) - Distrito 10: Sub Alcaldía',
            'Servicios Legales Integrales Municipales (SLIM) - Distrito 11: Sub Alcaldía',
            'Servicios Legales Integrales Municipales (SLIM) - Distrito 12: Sub Alcaldía',
            'Servicios Legales Integrales Municipales (SLIM)',
            'Servicios Legales Integrales Municipales (SLIM) - Distrito 14: Sub Alcaldía',
            'Servicios Legales Integrales Municipales (SLIM) - Distrito 15: Sub Alcaldía',
            'Adulto Mayor y personas con discapacidad - Distrito 1 (Central)',
            'FELCV - Santa Cruz',
            'Servicios Legales Integrales Municipales (SLIM) - Comarapa',
            'FELCV Zona Central',
            'FELCV Tusequis - EPI 8',
            'FELCV Pampa de la Isla - EPI 7',
            'FELCV Villa 1ro. de Mayo - EPI 5',
            'FELCV Plan 3000 - EPI 3',
            'FELCV Los Lotes - EPI 9',
            'FELCV Radial 17 1/2 - EPI 6',
            'FELCV - Cotoca',
            'FELCV - Pailón',
            'Gobierno Departamental de Santa Cruz, Dirección de Género'
            );
        $data['sc_telefono'] = array(
            '3335770',
            '3455098',
            '3435639',
            '3474514',
            '3571778',
            '3431685',
            '3496734',
            '3702479',
            '3571984',
            '3340057',
            '3703930',
            '3703909',
            '3882386',
            '3882386',
            '3414900',
            '72042264',
            '68836878',
            '72042264',
            '71559969',
            '71567517',
            '71556732',
            '71567561',
            '71564393',
            '71567643',
            '71566207',
            '71566207',
            '3592203'
            );
        $data['sc_direccion'] = array(
            'Prolongación, Calle Campero N° 55',
            '3er Anillo Interno, Lado Sonilum',
            '3er Anillo Externo entre Mutualista y Alemana, Calle Combate Villa Flor',
            '3er Anillo y Radial 10, frente a Polanco',
            '3er Anillo, frente al Club Hípico',
            'Av. Alemana, entre 5to y 6to Anillo, zona Norte',
            'Zona la Villa 1ro de Mayo, Av. Gral. Campero calle 7',
            'Plaza el Mechero, acera este',
            'Barrio Santa Ana, Doble Vía la Guardia Km. 5 1/2, entrando Rest.',
            'Calle Gualberto Villarroel N° 141, pasando media cuadra de la Irala',
            'Av. Bolivia, Barrio Fátima 2, Calle 15',
            'Plaza principal palmar del oratorio',
            'Plaza principal Paurito, acera sur',
            'Montero Hoyos, frente a la plaza principal',
            'Barrio Belén, Calle las Liras, entre 3er y 4to Anillo',
            'Av Santos Dumont, lado de Identificación',
            'Comarapa',
            'Av. Santos Dumont, 3er Anillo interno',
            'C. Racine, esq. c. Comeille 6to y 7mo anillo, zona norte',
            'Av. Virgen de Cotoca, frente Av. Jenecherú, entre 5to y 6to anillo',
            'C. Melaza, B. la moliendita',
            'C. Juana Azurduym barrio ciudad de la alegria, zona sud este',
            'Av. 27 de mayo y Av. nuevo palmar, barrio Fátima 1',
            'Av. Radial 17 1/2 C. Nueva Esperanza',
            'Carretera a Pailas, barrio Mague',
            'C. Etelvino Vaca Parada, B. Central Fátima',
            'Av. Francisco Mora 3er Anillo Interno Zona Polanco'
            );

        if($this->session->userdata('rol')=='admin')
        {
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='usuario') {
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read',$data);
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='policia') {
            $this->load->view('policia/inc/headergentelella');
            $this->load->view('policia/inc/sidebargentelella');
            $this->load->view('policia/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read',$data);
            $this->load->view('policia/inc/creditosgentelella');
            $this->load->view('policia/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='autoridad') {
            $this->load->view('autoridad/inc/headergentelella');
            $this->load->view('autoridad/inc/sidebargentelella');
            $this->load->view('autoridad/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read',$data);
            $this->load->view('autoridad/inc/creditosgentelella');
            $this->load->view('autoridad/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='moderador') {
            $this->load->view('moderador/inc/headergentelella');
            $this->load->view('moderador/inc/sidebargentelella');
            $this->load->view('moderador/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read',$data);
            $this->load->view('moderador/inc/creditosgentelella');
            $this->load->view('moderador/inc/footergentelella');
        }
    }
}