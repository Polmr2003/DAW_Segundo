import { Component} from '@angular/core';
import { CookieService } from 'ngx-cookie-service';
import { Producte } from 'src/app/model/Producte';

@Component({
  selector: 'app-merchandising',
  templateUrl: './merchandising.component.html',
  styleUrls: ['./merchandising.component.css'],
})
export class MerchandisingComponent {
  cesta: Producte[] = [];
  //añadimos los 4 productos
  productos: Producte[] = [
    new Producte('Producto1.PNG', 'Producto1', 'Descripción1', 10, 2),
    new Producte('Producto2.PNG', 'Producto2', 'Descripción2', 10, 3),
    new Producte('Producto3.PNG', 'Producto3', 'Descripción3', 10, 4),
    new Producte('Producto4.PNG', 'Producto4', 'Descripción4', 10, 5),
  ];
  //constructor
  constructor(private cookieService: CookieService) {
    if (this.cookieService.check('cesta')) {
      this.cesta = JSON.parse(this.cookieService.get('cesta'));
    }
  }

  //añadimos el producto
  afegirProducte(producto: Producte) {
    if (this.cesta.some((p) => p.nomProducte == producto.nomProducte)) {
      const totalProd = this.cesta.map((prod) => {
        if (prod.nomProducte == producto.nomProducte) {
          if (prod.disponibilitat != prod.quantitat) {
            prod.quantitat++;
          }
        }
        return prod;
      });
    } else {
      producto.quantitat = 1;
      this.cesta.push(producto);
    }
    this.cookieService.set('cesta', JSON.stringify(this.cesta));
  }
}
