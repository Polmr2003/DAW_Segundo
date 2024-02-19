import { ComponentFixture, TestBed } from '@angular/core/testing';

import { QuiSOMComponent } from './qui-som.component';

describe('QuiSOMComponent', () => {
  let component: QuiSOMComponent;
  let fixture: ComponentFixture<QuiSOMComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [QuiSOMComponent]
    });
    fixture = TestBed.createComponent(QuiSOMComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
