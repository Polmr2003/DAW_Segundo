import { Component, OnInit } from '@angular/core';
import { ConnectarService } from '../../services/connectar.service';
import { User } from 'src/app/model/User';

@Component({
  selector: 'app-proves-connectar',
  templateUrl: './proves-connectar.component.html',
  styleUrls: ['./proves-connectar.component.css']
})


export class ProvesConnectarComponent implements OnInit {

  constructor(private ConectarService: ConnectarService) { }

  ngOnInit() {

  }

  getUsers() {
    this.ConectarService.getUsers().subscribe(
      (result: any) => {
        // Accedemos a la posicion que queramos de el array de objetos i mostramos el valor
        //result.resultats[posicion].nombreDeLaColumnaQueHayEnLaBaseDeDatos
        const usuario = result.resultats[0].username;
        
        // Para añadirlo en un array de objetos tipo events
        // for (let index = 0; index < result.resultats.length; index++) {
        //   this.events.push(new Events(result.resultats[index].id, result.resultats[index].nombre));
        //   }

        console.log(result.resultats);
      },
      error => {
        console.error('Error al obtener los eventos:', error);
      }
    );
  }

  // editarEvento() {
  //   if (this.editEvent.valid) {
  //     this.db.update(this.editEvent.value.id, this.editEvent.value).subscribe(
  //       (result: any) => {
  //         this.getEvents();
  //       },
  //       error => {
  //         console.error('Error al actualizar el evento:', error);
  //       }
  //     );
  //   }
  // }
  
}
