import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { MyGuardGuard } from './auth/my-guard.guard';
import { HomeComponentComponent } from './home-component/home-component.component';
import { Com1Component } from './_com1/_com1.component';
import { Com2Component } from './_com2/_com2.component';

const rutes: Routes = [

  { path: 'com1',  component: Com1Component },  //, canActivate:[MyGuardGuard]
  { path: 'com2', component: Com2Component },
  { path: 'home',  component: HomeComponentComponent },
  { path:'', redirectTo:'/com1', pathMatch:'full'}
];

@NgModule({
  imports: [RouterModule.forRoot(rutes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
