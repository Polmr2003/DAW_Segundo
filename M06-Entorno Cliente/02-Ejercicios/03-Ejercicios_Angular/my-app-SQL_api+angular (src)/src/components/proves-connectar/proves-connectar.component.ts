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
      (result) => {
        // Accedemos a la posicion que queramos de el array de objetos i mostramos el valor
        //result.resultats[posicion].nombreDeLaColumnaQueHayEnLaBaseDeDatos
        const usuario = result.resultats[0].username;

        console.log(result.resultats);
      }
    );
  }
}
