import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { AppRoutingModule } from './app-routing.module';
import {NgxPaginationModule} from 'ngx-pagination'; // <-- import the module

import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { AppComponent } from './app.component';
import { FormComponent } from './components/form/form.component';
import { ValidarNomDirective } from './directives/validar-nom.directive';
import { ValidarEmailDirective } from './directives/validar-email.directive';
import { NotfoundComponent } from './components/notfound/notfound.component';
import { ValidarRepetirDirective } from './directives/validar-repetir.directive';
import { CookieService } from 'ngx-cookie-service';
import { LoginComponent } from './components/login/login.component';
import { LogoutComponent } from './components/logout/logout.component';
import { QuiSOMComponent } from './components/qui-som/qui-som.component';
import { ColeccionsComponent } from './components/coleccions/coleccions.component';
import { CistellaComponent } from './components/cistella/cistella.component';
import { AreaPrivadaComponent } from './components/area-privada/area-privada.component';
import { HomeComponent } from './components/home/home.component';
import { ValidarDniDirective } from './directives/validar-dni.directive';

@NgModule({
  declarations: [
    AppComponent,
    ValidarEmailDirective,
    FormComponent,
    ValidarNomDirective,
    NotfoundComponent,
    ValidarRepetirDirective,
    LoginComponent,
    LogoutComponent,
    QuiSOMComponent,
    ColeccionsComponent,
    CistellaComponent,
    AreaPrivadaComponent,
    HomeComponent,
    ValidarDniDirective
  ],
  imports: [
    BrowserModule, 
    FormsModule, 
    ReactiveFormsModule, 
    AppRoutingModule,
    NgxPaginationModule,
  ],
  providers: [CookieService],
  bootstrap: [AppComponent],
})
export class AppModule {}
