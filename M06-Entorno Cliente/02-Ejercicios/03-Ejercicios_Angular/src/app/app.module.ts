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
import { ListUsersComponent } from './components/list-users/list-users.component';
import { EditarUsuarioComponent } from './components/editar-usuario/editar-usuario.component';
import { LogoutComponent } from './components/logout/logout.component';
import { PaginationComponent } from './components/pagination/pagination.component';

@NgModule({
  declarations: [
    AppComponent,
    ValidarEmailDirective,
    FormComponent,
    ValidarNomDirective,
    NotfoundComponent,
    ValidarRepetirDirective,
    LoginComponent,
    ListUsersComponent,
    EditarUsuarioComponent,
    LogoutComponent,
    PaginationComponent,
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
