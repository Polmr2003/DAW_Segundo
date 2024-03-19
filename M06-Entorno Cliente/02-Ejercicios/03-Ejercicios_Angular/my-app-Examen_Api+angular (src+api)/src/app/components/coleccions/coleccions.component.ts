import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { Article } from 'src/app/model/Article';
import { SincronService } from 'src/app/services/sincron.service';

@Component({
  selector: 'app-coleccions',
  templateUrl: './coleccions.component.html',
  styleUrls: ['./coleccions.component.css']
})
export class ColeccionsComponent {

  message!: string;
  article: Article[] = [];
  p: number = 1;;

  constructor(private router: Router, private sincro: SincronService) { }

  // miramos si estamos estamos logeados mirando la localStorage
  ngOnInit(): void {
    for (let i = 1; i <= 100; i++) {
      this.article.push(new Article('Article' + i, "Lorem ipsum", i));
    }

    this.sincro.currentMessage.subscribe(message => this.message = message);
  }

}
